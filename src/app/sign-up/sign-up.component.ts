import { PostService } from './../shared/post.service';
import { PasswordValidation } from './../shared/confirmed-validator';
import { escapeIdentifier } from '@angular/compiler/src/output/abstract_emitter';
import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { conditionallyCreateMapObjectLiteral } from '@angular/compiler/src/render3/view/util';


@Component({
  selector: 'app-sign-up',
  templateUrl: './sign-up.component.html',
  styleUrls: ['./sign-up.component.scss']
})
export class SignUpComponent implements OnInit {
  signUpForm: FormGroup;
  passwordError: boolean;
  invalidUserName : boolean;
  submitted: boolean;
  userNameErrorMessage = "Username must begin with alphabet and may include numbers or hyphen";
  passwordErroMessage = "Password must be at least 8 characters";
  confirmPasswordErroMessage = "Both Passwords does not match";
  countryOfOriginErrorMessage = "you must select your country of origin";
  countryOfOriginErrorMessage2 = "Are you trying to create your own country?";
  termsAndConditionsErrorMessage = "You must select our terms and conditions first";


  constructor(private postService: PostService) { }

  ngOnInit(): void {
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

  isValidInput(fieldName): boolean {
    return this.signUpForm.controls[fieldName].invalid && //this.signUpForm.controls[fieldName].touched;
       (this.signUpForm.controls[fieldName].dirty || this.signUpForm.controls[fieldName].touched);
   }

  isInvalidInput(fieldName:string){
    if(this.signUpForm.controls[fieldName].invalid){
      this.signUpForm.controls[fieldName].markAsTouched();
     }
  }


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
      this.validateAllFormFields(this.signUpForm);

    }
    else{
      //console.log(this.signUpForm);
      let userDetails = {
        username: this.signUpForm.controls['userName'].value,
        email: this.signUpForm.controls['email'].value,
        password: this.signUpForm.controls['password'].value,
        countryOfOrigin: this.signUpForm.controls['countryOfResidence'].value      
      }
      console.log(userDetails);  // display the user details for debugging purposes
      // send the user details to the server
      this.postService.SendDetails(userDetails).subscribe(
        response =>{
          console.log(response);
        },
        (error: Response) => {
          // checks if the user entered an invalid data
          if(error.status === 400){
            this.signUpForm.setErrors(error.json());
          }
          else{
            alert("An uxpected error occured");
            console.log(error);
          }
          
        }
      )
    }
   

  
  }

  onSubmit(){
    // this is where i put the raw javascript code
  }
}

