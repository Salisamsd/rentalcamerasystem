import { Component, ViewChild } from "@angular/core";
import {
  NavController,
  AlertController,
  ModalController,
  NavParams
} from "ionic-angular";
import { Http, Headers, RequestOptions } from "@angular/http";
import { LoadingController } from "ionic-angular";
import { ProfilePage } from "../profile/profile";
import { HistoryPage } from "../history/history";
import { UpimagePage } from "../upimage/upimage";
import { WelcomePage } from "../welcome/welcome";
import { ChangepassPage } from "../changepass/changepass";
import { App } from "ionic-angular";
@Component({
  selector: "page-contact",
  templateUrl: "contact.html"
})
export class ContactPage {
  data: any;
  username: any;
  items: any;
  telephone: any;
  email: any;

  constructor(
    public alertCtrl: AlertController,
    public app: App,
    public navCtrl: NavController,
    public navParams: NavParams,
    private http: Http,
    public loading: LoadingController,
    public modalCtrl: ModalController
  ) {
    this.username = this.navParams.get("username");
    this.username = navParams.data;
  }

  ionViewDidLoad() {
    console.log("ionViewDidLoad ContactPage");
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
  change(item) {
    this.navCtrl.push(ChangepassPage, item);
  }

  editPost(item) {
    this.navCtrl.push(ProfilePage, item);
  }

  upPost(item) {
    this.navCtrl.push(UpimagePage, item);
  }
  History(item) {
    this.navCtrl.push(HistoryPage, item);
  }
  logout() {
    let alert = this.alertCtrl.create({
      title: "ลงชื่ออก",
      message: "คุณแน่ใจที่จะลงชื่อออก ?",
      buttons: [
        {
          text: "ยกเลิก",
          role: "cancel",
          handler: () => {
            console.log("Cancel clicked");
          }
        },
        {
          text: "ตกลง",
          handler: () => {
            this.app.getRootNav().setRoot(WelcomePage);
          }
        }
      ]
    });
    alert.present();
  }

  // this.navCtrl.setPages(WelcomePage)
}
