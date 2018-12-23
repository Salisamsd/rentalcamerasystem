import { Component, ViewChild, OnInit, Renderer, Input } from "@angular/core";
import {
  NavController,
  ModalController,
  NavParams,
  AlertController
} from "ionic-angular";
import { Http, Headers, RequestOptions } from "@angular/http";
import { LoadingController } from "ionic-angular";

/**
 * Generated class for the ChangepassPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@Component({
  selector: "page-changepass",
  templateUrl: "changepass.html"
})
export class ChangepassPage {
  @ViewChild("oldPass") oldPass;
  @ViewChild("newPass") newPass;
  @ViewChild("conPass") conPass;
  items: any;
  password: any;
  username: any;

  constructor(
    public navCtrl: NavController,
    public alertCtrl: AlertController,
    private http: Http,
    public loading: LoadingController,
    public navParams: NavParams
  ) {
    this.username = this.navParams.get("username");
    this.password = this.navParams.get("password");
  }
  ionViewDidLoad() {
    console.log("ionViewDidLoad ChangepassPage ");
    console.log(this.navParams.data);
  }

  changePass() {
    //// check to confirm the username, email, telephone and password fields are filled
    this.username = this.navParams.get("username");
    this.password = this.navParams.get("password");

    if (this.newPass.value == "") {
      let alert = this.alertCtrl.create({
        title: "กรุณากรอกรหัสผ่านใหม่",

        //subTitle: "Country field is empty",

        buttons: ["OK"]
      });

      alert.present();
    } else if (this.conPass.value == "") {
      let alert = this.alertCtrl.create({
        title: "กรุณากรอกรหัสใหม่เพื่อยืนยันรหัสผ่านใหม่",

        //subTitle: "Country field is empty",

        buttons: ["OK"]
      });

      alert.present();
    } else if (this.newPass.value != this.conPass.value) {
      let alert = this.alertCtrl.create({
        title: "รหัสผ่านของไม่ตรงกัน",
        //subTitle: "รหัสผ่านของไม่ตรงกัน",
        buttons: ["OK"]
      });

      alert.present();
    } else {
      var headers = new Headers();
      headers.append("Accept", "application/json");
      headers.append("Content-Type", "application/json");
      let options = new RequestOptions({ headers: headers });

      let data = {
        username: this.username,
        password: this.password,
        newPass: this.newPass.value
      };

      let loader = this.loading.create({
        content: "Processing please wait..."
      });

      loader.present().then(() => {
        this.http
          .post("http://manocamera.com/api/changePass.php", data, options)
          .map(res => res.json())
          .subscribe(res => {
            loader.dismiss();
            if (res == "successfull") {
              let alert = this.alertCtrl.create({
                title: "เปลี่ยนรหัสสำเร็จ",
                //subTitle: res,
                buttons: ["ตกลง"]
              });

              alert.present();
            }
          });
      });
    }
  }
}
