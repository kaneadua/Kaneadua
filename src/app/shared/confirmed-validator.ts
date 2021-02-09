import {AbstractControl, ValidationErrors} from '@angular/forms';

export class PasswordValidation{

    static MatchPassword(AC: AbstractControl){
        let password = AC.get('password').value;
        let confirmPassword = AC.get('confirmPassword').value;
        if((password!= confirmPassword) || (password==''&& confirmPassword=='') ){
            // console.log('false');
            AC.get('confirmPassword').setErrors({MatchPassword: true});

        }
        else{
            // console.log('true');
            return null;
        }
    }

    static ValidCountry(AC: AbstractControl): ValidationErrors|null{
        let country = AC.value;
        console.log(country);
        var verify = false;
        let countries:any = document.getElementsByTagName('option');

        for (var i = 0; i < countries.length; i++) {
            if (countries[i].value.toLowerCase() === country.toLowerCase()) {
                verify = true;
                break;
            }

        }

        if (verify) {
            //return null;
            AC.get('countryOfResidence').setErrors(null);
        }
        // else if (country == '') {
        //     return {required: true};
        // }
        else{
           // AC.get('countryOfResidence').setErrors({MatchedCountry: true});
           return {MatchedCountry: true};
        }
    }
}
