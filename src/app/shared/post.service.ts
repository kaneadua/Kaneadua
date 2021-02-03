import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class PostService {
  private url ="http://api.kaneadua.com/";
  constructor(private http: HttpClient) { }

  // to get the details from the server
  getDetails(){
    return this.http.get(this.url);
  }
  // to send post request to the server 
  SendDetails(userdetails:any){
      return this.http.post(this.url, JSON.stringify(userdetails));
  }
}
