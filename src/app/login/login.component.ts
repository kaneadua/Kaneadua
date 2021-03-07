import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { SocialAuthService, SocialUser } from "angularx-social-login";
import { FacebookLoginProvider, GoogleLoginProvider } from "angularx-social-login";


@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {
  error:boolean = false; // sets the error message to true
  // login Form
  loginForm: FormGroup;

  //Using local storage
  userLogin;
  constructor(private authService: SocialAuthService) { }

  user: SocialUser; // social user object
  loggedIn: boolean;  // check if the user is logged in
  ngOnInit(): void {
    // initialize the login form for the various input fields
    this.loginForm = new FormGroup({
      username: new FormControl('', Validators.required),
      password: new FormControl('', Validators.required)
    });


    // get the sign in with google user details
    this.authService.authState.subscribe((user) => {
      this.user = user;
      this.userLogin= user;
      this.loggedIn = (user != null);
      console.log(this.user);
      console.log(this.loggedIn);
    });
  }

  // function to submit the user details to the server
  onSubmit(){
    if(this.loginForm.valid){
      localStorage.setItem("user", JSON.stringify(this.userLogin));
      console.log(this.loginForm); // console logs the login forms
      console.log(this.loginForm.value)
    }
    // if the form is invalid, display an error message
    else{
      this.error = true;
    }



  }
  signInWithGoogle(): void {
    this.authService.signIn(GoogleLoginProvider.PROVIDER_ID);
    localStorage.setItem("user", JSON.stringify(this.userLogin));

  }

  signInWithFB(): void {
    this.authService.signIn(FacebookLoginProvider.PROVIDER_ID);
    localStorage.setItem("user", JSON.stringify(this.userLogin));

  }

  signOut(): void {
    localStorage.clear();
    this.authService.signOut();
  }

}
