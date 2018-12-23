import { Component, ViewChild } from "@angular/core";
import {
  IonicPage,
  NavController,
  NavParams,
  AlertController,
  Platform
} from "ionic-angular";
import { Observable } from "rxjs/Observable";
import { DetailPage } from "../detail/detail";
import { Http, Headers, RequestOptions } from "@angular/http";
import { LoadingController } from "ionic-angular";
import "rxjs/add/operator/map";
import { MenuController } from "ionic-angular";
import { App } from "ionic-angular";



@IonicPage()
@Component({
  selector: "page-mirrorless",
  templateUrl: "mirrorless.html"
})
export class MirrorlessPage {
  data: any;
  username: any;
  telephone: any;
  email: any;

  items: any = [];
  items1: any = [];
  items2: any = [];
  items3: any = [];
  choice: string = "body";
  isAndroid: boolean = false;
  constructor(
    public app: App,
    public navCtrl: NavController,
    public navParams: NavParams,
    private http: Http,
    public loading: LoadingController,
    public menuCtrl: MenuController,
    public alertCtrl: AlertController,
    platform: Platform
  ) {
    this.username = navParams.data.username2;
    console.log("this.username", this.username);

    this.isAndroid = platform.is("android");

    this.http
      .get("http://manocamera.com/api/ML/list_ML_B.php")
      .map(res => res.json())
      .subscribe(data => {
        this.items = data["data"];
      });

    this.http
      .get("http://manocamera.com/api/ML/list_ML_BL.php")
      .map(res => res.json())
      .subscribe(data => {
        this.items1 = data["data"];
      });

    this.http
      .get("http://manocamera.com/api/ML/list_ML_L.php")
      .map(res => res.json())
      .subscribe(data => {
        this.items2 = data["data"];
      });

    // this.http
    //   .get("http://manocamera.com/api/ML/list_ML_A.php")
    //   .map(res => res.json())
    //   .subscribe(data => {
    //     this.items3 = data["data"];
    //   });
  }

  detail(item) {
    this.navCtrl.push(DetailPage, {
      item: item,
      username: this.username
    });
  }
}
