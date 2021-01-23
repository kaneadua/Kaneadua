import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';


@Component({
  selector: 'app-sign-up',
  templateUrl: './sign-up.component.html',
  styleUrls: ['./sign-up.component.scss']
})
export class SignUpComponent implements OnInit {
  signUpForm: FormGroup;
  constructor() { }

  ngOnInit(): void {
    this.signUpForm = new FormGroup({
      userName: new FormControl('', Validators.required),
      email: new FormControl('', [Validators.required, Validators.email]),
      password: new FormControl(''),
      confirmPassword: new FormControl(''),
      countryOfResidence: new FormControl(''),
      // checkboxes: requiredTrue
      newsLetter: new FormControl(''),
      termsAndConditions: new FormControl('')
      
    });
  }

  isValidInput(fieldName): boolean {
    return this.signUpForm.controls[fieldName].invalid &&
      (this.signUpForm.controls[fieldName].dirty || this.signUpForm.controls[fieldName].touched);
   }

  onSignUp(){
    console.log(this.signUpForm);
  }

}

