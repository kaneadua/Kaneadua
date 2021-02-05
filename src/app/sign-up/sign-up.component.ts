import { PostService } from './../shared/post.service';
import { PasswordValidation } from './../shared/confirmed-validator';
import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute, Routes, Router } from '@angular/router';



@Component({
  selector: 'app-sign-up',
  templateUrl: './sign-up.component.html',
  styleUrls: ['./sign-up.component.scss']
})
export class SignUpComponent implements OnInit {
  signUpForm: FormGroup;
  error: boolean;
  loader: boolean;
  url: string = "http://api.kaneadua.com/users/add"; // url to send the post request
  userNameErrorMessage = "Username must begin with alphabet and may include numbers or hyphen";
  passwordErroMessage = "Password must be at least 8 characters";
  confirmPasswordErroMessage = "Both Passwords does not match";
  termsAndConditionsErrorMessage = "You must select our terms and conditions first";


  constructor(private postService: PostService,
    private route: Router) { }

  ngOnInit(): void {
    // creating the signup form 
    this.signUpForm = new FormGroup({
      userName: new FormControl('', [Validators.required, Validators.pattern("")]),
      email: new FormControl('', [Validators.required, Validators.email]),
      password: new FormControl('',[Validators.required, Validators.minLength(8)]),
      confirmPassword: new FormControl('',[Validators.required, Validators.minLength(8)]),
      countryOfResidence: new FormControl('',[ PasswordValidation.ValidCountry]),
      // checkboxes: requiredTrue
      newsLetter: new FormControl('', Validators.requiredTrue),
      termsAndConditions: new FormControl('',Validators.requiredTrue)
      
    }, PasswordValidation.MatchPassword);
  }

  // checks if a field name is valid 
  isValidInput(fieldName): boolean {
    return this.signUpForm.controls[fieldName].invalid && //this.signUpForm.controls[fieldName].touched;
       (this.signUpForm.controls[fieldName].dirty || this.signUpForm.controls[fieldName].touched);
   }

  isInvalidInput(fieldName:string){
    if(this.signUpForm.controls[fieldName].invalid){
      this.signUpForm.controls[fieldName].markAsTouched();
     }
  }


  // Validate all form fields when the user submits the form
  validateAllFormFields(formGroup: FormGroup){
    Object.keys(formGroup.controls).forEach( field=>{
      const control = formGroup.get(field);
      control.markAsTouched({onlySelf: true});
    }

    )
  }
  onSignUp(){
    console.log(this.signUpForm.get('countryOfResidence').value);
    if(this.signUpForm.valid==false){
      // console.log('Invalid input');
      // this.isInvalidInput('userName');
      // this.isInvalidInput('email');
      // this.isInvalidInput('password');
      // this.isInvalidInput('confirmPassword');
      // this.isInvalidInput('countryOfResidence');
      // this.isInvalidInput('newsLetter');
      // this.isInvalidInput('termsAndConditions');
      this.loader = false;
      this.validateAllFormFields(this.signUpForm);

    }
    else{
      //console.log(this.signUpForm);
      this.loader = true;
      let userDetails = {
        username: this.signUpForm.controls['userName'].value,
        email: this.signUpForm.controls['email'].value,
        password: this.signUpForm.controls['password'].value,
        countryOfOrigin: this.signUpForm.controls['countryOfResidence'].value      
      }
      console.log(userDetails);  // display the user details for debugging purposes
      // send the user details to the server
      this.postService.SendUserDetails(this.url, userDetails).subscribe(
        response =>{
          console.log(response);
          this.route.navigate(['/login']);
          this.loader = false;
        },
        (error: Response) => {
          // checks if the user entered an invalid data
          if(error.status === 400){
            this.signUpForm.setErrors(error.json());
          }
          else{
            // for all other errors
            this.loader = false;
           this.error = true;
            console.log(error);
          }
          
        }
      )
    }
   
  }

}

