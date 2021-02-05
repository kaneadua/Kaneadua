import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class PostService {
  // private url ="http://api.kaneadua.com/";
  constructor(private http: HttpClient) { }

  // to get the details from the server
  getDetails(url: string, username:string){
    return this.http.get(`${url}/${username}`);
  }
  // to send post request to the server 
  SendDetails(url: string, userdetails:any){
      return this.http.post(url, JSON.stringify(userdetails));
  }
}
