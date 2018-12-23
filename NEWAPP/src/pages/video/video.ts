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
 * Generated class for the VideoPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: "page-video",
  templateUrl: "video.html"
})
export class VideoPage {
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
   
    this.username = navParams.data.username3;
    console.log("this.username", this.username);

    this.isAndroid = platform.is("android");

    this.http
      .get("http://manocamera.com/api/video/list_video_B.php")
      .map(res => res.json())
      .subscribe(data => {
        this.items = data["data"];
      });

   
  }

  detail(item) {
    this.navCtrl.push(DetailPage, {
      item: item,
      username: this.username
    });
  }
}
