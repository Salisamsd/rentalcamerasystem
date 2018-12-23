import { Component } from "@angular/core";
import { IonicPage, NavController, NavParams } from "ionic-angular";

/**
 * Generated class for the DetailWcPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: "page-detail-wc",
  templateUrl: "detail-wc.html"
})
export class DetailWcPage {
  username: any;
  item: any;
  constructor(public navCtrl: NavController, public navParams: NavParams) {
    this.item = navParams.data.item;
    this.username = navParams.data.username;
  }

  ionViewDidLoad() {
    console.log("ionViewDidLoad DetailWcPage");
  }
}
