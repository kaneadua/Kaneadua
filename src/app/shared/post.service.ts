import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class PostService {
  // private url ="http://api.kaneadua.com/";
  constructor(private http: HttpClient) { }

  // to get the details from the server
  getUserDetails(url: string, username:string){
    return this.http.get(`${url}/${username}`);
  }
  // to send post request to the server 
  SendUserDetails(url: string, userdetails:any){
      return this.http.post(url, JSON.stringify(userdetails));
  }
}
