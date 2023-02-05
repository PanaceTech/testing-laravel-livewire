<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Student;

class MultistepForm extends Component
{
    use WithFileUploads;

    public $first_name, $last_name, $gender, $age, $description, $email, $phone, $country, $city, $frameworks = [], $cv, $terms;

    public $totalSteps = 4;
    public $currentStep = 1;


    public function mount()
    {
        $this->currentStep = 1;
    }

    public function render()
    {
        return view('livewire.multistep-form');
    }

    public function increaseStep()
    {
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }

    public function validateData()
    {
        if ($this->currentStep == 1) {
            $this->validate([
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'gender' => 'required',
                'age' => 'required|digits:2'
            ]);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'email' => 'required|email|unique:students,email',
                'phone' => 'required',
                'country' => 'required',
                'city' => 'required'
            ]);
        } elseif ($this->currentStep == 3) {
            $this->validate([
                'frameworks' => 'required|array|min:2|max:3'
            ]);
        }
        
    }

    public function register()
    {
        $this->resetErrorBag();

        if ($this->currentStep == 4) {
            $this->validate([
                'cv' => 'required|mimes:pdf|max:1024',
                'terms' => 'required'
            ]);
        }

        $cv_name = "CV_". date('Ymd_His_') .$this->cv->getClientOriginalName();
        $upload_cv = $this->cv->storeAs('students_cvs', $cv_name);

        if ($upload_cv) {
            $values = array(
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'gender' => $this->gender,
                'age' => $this->age,
                'email' => $this->email,
                'phone' => $this->phone,
                'country' => $this->country,
                'city' => $this->city,
                'frameworks' => json_encode($this->frameworks),
                'description' => $this->description,
                'cv' => $cv_name,
            );
        }
        
        Student::insert($values);
        /*$this->reset();
        $this->currentStep = 1;*/

        return redirect()->route('register.success', $values);
    }
}
