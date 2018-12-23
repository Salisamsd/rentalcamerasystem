import { Component, ViewChild } from "@angular/core";
import {
  NavController,
  AlertController,
  NavParams,
  ModalController
} from "ionic-angular";
import { Http, Headers, RequestOptions } from "@angular/http";
import { LoadingController } from "ionic-angular";

/**
 * Generated class for the DetailRentPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@Component({
  selector: "page-detail-rent",
  templateUrl: "detail-rent.html"
})
export class DetailRentPage {
  username: any;
  item: any;
  rentID: any;
  status_r: any;
  constructor(
    public navCtrl: NavController,
    public navParams: NavParams,
    private http: Http,
    public loading: LoadingController,
    public alertCtrl: AlertController,
    public modalCtrl: ModalController
  ) {
    this.item = navParams.data.item;
    this.rentID = this.item["rentID"];
    this.username = navParams.data.username;
    this.status_r = this.item["status_r"];
  }

  ionViewDidLoad() {
    console.log("ionViewDidLoad DetailRentPage");
    console.log(this.navParams.data);
  }
  cancel() {
    this.rentID = this.item["rentID"];
    this.status_r = this.item["status_r"];
    var headers = new Headers();
    headers.append("Accept", "application/json");
    headers.append("Content-Type", "application/json");
    let options = new RequestOptions({ headers: headers });
    var ts = new Date();
    let data = {
      date: ts.toLocaleDateString(),
      rentID: this.rentID,
      status_r: this.status_r
    };

    let loader = this.loading.create({
      content: "Processing please wait..."
    });

    loader.present().then(() => {
      this.http
        .post("http://manocamera.com/api/cancel.php", data, options)
        .map(res => res.json())
        .subscribe(res => {
          loader.dismiss();
          // console.log(res);
          if (res == "Registration successfull") {
            let alert = this.alertCtrl.create({
              title: "ยกเลิกสำเร็จ",
              subTitle: res,
              buttons: ["OK"]
            });

            alert.present();
          } else {
            let alert = this.alertCtrl.create({
              title: "ERROR",
              subTitle: res,
              buttons: ["OK"]
            });

            alert.present();
          }
        });
    });
  }
}
