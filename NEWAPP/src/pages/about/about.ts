import { Component } from '@angular/core';
import { NavController , ModalController , NavParams } from 'ionic-angular';
import {Http, Headers, RequestOptions}  from "@angular/http";
import { LoadingController } from 'ionic-angular';
import { HistoryPage } from '../history/history';
import { RentformPage } from "../rentform/rentform";

@Component({
  selector: 'page-about',
  templateUrl: 'about.html'
})
export class AboutPage {

constructor( public modalCtrl: ModalController) 
{

}
checkdetail() {
  this.modalCtrl.create(RentformPage).present();
}
}
