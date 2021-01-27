import {AbstractControl} from '@angular/forms';

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

    // static ValidCountry(AC: AbstractControl){
    //     let country = AC.get('countryOfResidence').value;
    //     console.log(country);
    //     var verify = false;
    //     let countries:any = document.getElementsByTagName('option');

    // for (var i = 0; i < countries.length; i++) {
    //     if (countries[i].value.toLowerCase() === country) {
    //         verify = true;
    //         break;
    //     }

    // }

    // if (verify) {
    //     return null;
    // }else{
    //     AC.get('countryOfResidence').setErrors({MatchedCountry: true});
    // }
}
