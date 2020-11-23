import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {
  error:boolean = false; // sets the error message to true
  // login Form 
  loginForm: FormGroup;
  constructor() { }

  ngOnInit(): void {
    // initialize the login form for the various input fields
    this.loginForm = new FormGroup({
      username: new FormControl('', Validators.required),
      password: new FormControl('', Validators.required)
    });
  }

  // function to submit the user details to the server
  onSubmit(){
    if(this.loginForm.valid){
      console.log(this.loginForm); // console logs the login forms
      console.log(this.loginForm.value)
    }
    // if the form is invalid, display an error message
    else{
      this.error = true;
    }
    


  }

}
