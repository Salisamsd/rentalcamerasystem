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

/**
 * Generated class for the AccPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: "page-acc",
  templateUrl: "acc.html"
})
export class AccPage {
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
    // this.username = this.navParams.get('username1');
    // this.username = navParams.data;
    this.username = navParams.data.username5;
    console.log("this.username", this.username);

    this.isAndroid = platform.is("android");

    this.http
      .get("http://manocamera.com/api/acc/list_acc_acc.php")
      .map(res => res.json())
      .subscribe(data => {
        this.items = data["data"];
      });

    this.http
      .get("http://manocamera.com/api/acc/list_acc_battery.php")
      .map(res => res.json())
      .subscribe(data => {
        this.items1 = data["data"];
      });

    this.http
      .get("http://manocamera.com/api/acc/list_acc_mem.php")
      .map(res => res.json())
      .subscribe(data => {
        this.items2 = data["data"];
      });
  }

  detail(item) {
    this.navCtrl.push(DetailPage, {
      item: item,
      username: this.username
    });
  }
}
