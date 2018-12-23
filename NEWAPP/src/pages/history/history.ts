import { Component, ViewChild, OnInit, Renderer, Input } from "@angular/core";
import {
  NavController,
  ModalController,
  NavParams,
  Platform
} from "ionic-angular";
import { Http, Headers, RequestOptions } from "@angular/http";
import { LoadingController } from "ionic-angular";
import { DetailRentPage } from "../detail-rent/detail-rent";
import { DetailWcPage } from "../detail-wc/detail-wc";
/**
 * Generated class for the HistoryPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@Component({
  selector: "page-history",
  templateUrl: "history.html"
})
export class HistoryPage {
  choice: string = "now";
  isAndroid: boolean = false;
  items: any = [];
  items1: any = [];
  items2: any = [];
  data: any;
  telephone: any;
  username: any;
  nationID: any;
  rentID: any;
  constructor(
    platform: Platform,
    public navCtrl: NavController,
    public navParams: NavParams,
    private http: Http,
    public loading: LoadingController,
    public modalCtrl: ModalController
  ) {
    this.isAndroid = platform.is("android");
    this.username = this.navParams.get("username");

    var headers = new Headers();

    headers.append("Accept", "application/json");

    headers.append("Content-Type", "application/json");

    let options = new RequestOptions({ headers: headers });

    let data = {
      username: this.username
    };

    let loader = this.loading.create({
      content: "Processing please wait..."
    });

    loader.dismiss().then(() => {
      this.http
        .post("http://manocamera.com/api/Rentstatus.php", data, options)

        .map(res => res.json())

        .subscribe(data => {
          loader.dismiss();

          this.items = data["data"];

          // console.log(this.items);
        });

      this.http
        .post("http://manocamera.com/api/RentHistory.php", data, options)

        .map(res => res.json())

        .subscribe(data => {
          loader.dismiss();

          this.items1 = data["data"];

          console.log(this.items1);
        });
      this.http
        .post("http://manocamera.com/api/RentCancel.php", data, options)

        .map(res => res.json())

        .subscribe(data => {
          loader.dismiss();

          this.items2 = data["data"];

          console.log(this.items2);
        });
    });
  }

  ionViewDidLoad() {
    console.log("ionViewDidLoad HistoryPage");
    console.log(this.navParams.data);
  }
  detail(item) {
    this.navCtrl.push(DetailRentPage, {
      item: item,
      username: this.username
    });
  }
  detailWC(item) {
    this.navCtrl.push(DetailWcPage, {
      item: item,
      username: this.username
    });
  }
  load() {
    this.username = this.navParams.get("username");

    var headers = new Headers();

    headers.append("Accept", "application/json");

    headers.append("Content-Type", "application/json");

    let options = new RequestOptions({ headers: headers });

    let data = {
      username: this.username
    };

    let loader = this.loading.create({
      content: "Processing please wait..."
    });

    loader.dismiss().then(() => {
      //8YQJAfAOR4Ts0gqyTLeQxa9Pwobxa7O5ooP1hCD5ite

      this.http
        .post("http://manocamera.com/api/Rentstatus.php", data, options)

        .map(res => res.json())

        .subscribe(data => {
          loader.dismiss();

          this.items = data["data"];

          // console.log(this.items);
        });

      this.http
        .post("http://manocamera.com/api/RentHistory.php", data, options)

        .map(res => res.json())

        .subscribe(data => {
          loader.dismiss();

          this.items1 = data["data"];

          console.log(this.items1);
        });
      this.http
        .post("http://manocamera.com/api/RentCancel.php", data, options)

        .map(res => res.json())

        .subscribe(data => {
          loader.dismiss();

          this.items2 = data["data"];

          console.log(this.items2);
        });
    });
  }
  doRefresh(refresher) {
    console.log("Begin async operation", refresher);

    setTimeout(() => {
      this.load();
      console.log("Async operation has ended");
      refresher.complete();
    }, 2000);
  }
}
