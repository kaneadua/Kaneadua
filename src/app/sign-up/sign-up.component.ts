import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';


@Component({
  selector: 'app-sign-up',
  templateUrl: './sign-up.component.html',
  styleUrls: ['./sign-up.component.scss']
})
export class SignUpComponent implements OnInit {
  signUpForm: FormGroup;
  userNameErrorMessage = "Username must begin with alphabet and may include numbers or hyphen";
  emailErrorMessage = "Email is invalid";
  passwordErroMessage = "Password must be at least 8 characters";
  confirmPasswordErroMessage = "Both Passwords does not match";
  countryOfOriginErrorMessage = "you must select your country of origin";
  countryOfOriginErrorMessage2 = "Are you trying to create your own country?";
  termsAndConditionsErrorMessage = "You must select our terms and conditions first";


  constructor() { }

  ngOnInit(): void {
    this.signUpForm = new FormGroup({
      userName: new FormControl('', [Validators.required, Validators.pattern("")]),
      email: new FormControl('', [Validators.required, Validators.email]),
      password: new FormControl('',[Validators.required, Validators.minLength(8)]),
      confirmPassword: new FormControl('',[Validators.required, Validators.minLength(8)]),
      countryOfResidence: new FormControl('', Validators.required),
      // checkboxes: requiredTrue
      newsLetter: new FormControl('', Validators.requiredTrue),
      termsAndConditions: new FormControl('',Validators.requiredTrue)
      
    });
  }

  isValidInput(fieldName): boolean {
    return this.signUpForm.controls[fieldName].invalid &&
      (this.signUpForm.controls[fieldName].dirty || this.signUpForm.controls[fieldName].touched);
   }

  onSignUp(){
    // this is where i put the javascript code
    console.log(this.signUpForm);
  }

  onSubmit(){
    // this is where i put the raw javascript code
  }
}

