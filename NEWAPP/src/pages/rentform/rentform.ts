import { Component } from "@angular/core";
import { NavController, NavParams, ViewController } from "ionic-angular";

/**
 * Generated class for the RentformPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@Component({
  selector: "page-rentform",
  templateUrl: "rentform.html"
})
export class RentformPage {
  constructor(
    public navCtrl: NavController,
    public navParams: NavParams,
    public viewCtrl: ViewController
  ) {}

  ionViewDidLoad() {
    console.log("ionViewDidLoad RentformPage");
  }

  closeModal() {
    this.viewCtrl.dismiss();
  }
}
