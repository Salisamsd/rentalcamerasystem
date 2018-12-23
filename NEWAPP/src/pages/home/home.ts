import { Component, ViewChild } from "@angular/core";
import { NavController, AlertController, NavParams } from "ionic-angular";
import { VideoPage } from "../video/video";
import { ActonPage } from "../acton/acton";
import { AccPage } from "../acc/acc";
import { DslrPage } from "../dslr/dslr";
import { MirrorlessPage } from "../mirrorless/mirrorless";
import { Http, Headers, RequestOptions } from "@angular/http";
import { LoadingController } from "ionic-angular";
import "rxjs/add/operator/map";
import { MenuController } from "ionic-angular";
import { App } from "ionic-angular";
@Component({
  selector: "page-home",
  templateUrl: "home.html"
})
export class HomePage {
  data: any;
  username: any;
  items: any;
  telephone: any;
  email: any;
  items1: any = [];
  constructor(
    public app: App,
    public navCtrl: NavController,
    public navParams: NavParams,
    private http: Http,
    public loading: LoadingController,
    public menuCtrl: MenuController,
    public alertCtrl: AlertController
  ) {
    this.username = this.navParams.get("username");
    this.username = navParams.data;
  }

  ionViewDidLoad() {
    console.log("ionViewDidLoad HomePage");
    console.log(this.navParams.data);
  }

  ngOnInit() {
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

    loader.present().then(() => {
      this.http
        .post("http://manocamera.com/api/retrieve_data.php", data, options)

        .map(res => res.json())

        .subscribe(res => {
          loader.dismiss();

          this.items = res.server_response;

          console.log(this.items);
        });
    });
  }

  goDslr() {
    let data = {
      username1: this.username
    };

    this.navCtrl.push(DslrPage, data);

    //this.navCtrl.push(DslrPage,this.username);
  }
  goML() {
    let data = {
      username2: this.username
    };

    this.navCtrl.push(MirrorlessPage, data);
  }
  goVI() {
    let data = {
      username3: this.username
    };

    this.navCtrl.push(VideoPage, data);
  }
  goAT() {
    let data = {
      username4: this.username
    };

    this.navCtrl.push(ActonPage, data);
  }
  goAC() {
    let data = {
      username5: this.username
    };

    this.navCtrl.push(AccPage, data);
  }
}
