import { Component, ViewChild } from "@angular/core";

import {
  IonicPage,
  NavController,
  NavParams,
  AlertController
} from "ionic-angular";

import { Http, Headers, RequestOptions } from "@angular/http";

import { LoadingController } from "ionic-angular";

import "rxjs/add/operator/map";

import { ContactPage } from "../contact/contact";
import { HomePage } from "../home/home";

@IonicPage()
@Component({
  selector: "page-profile",

  templateUrl: "profile.html"
})
export class ProfilePage {
  items: any;
  data: any;

  username: any;
  name: any;
  lastname: any;
  bdate: any;
  nationID: any;
  address: any;
  telephone: any;
  email: any;

  oldnameValue: any;
  oldlastnameValue: any;
  oldbdateValue: any;
  oldnationIDValue: any;
  oldaddressValue: any;

  oldTelephoneValue: any;
  oldEmailValue: any;
  @ViewChild("newname") newname;
  @ViewChild("newlastname") newlastname;
  @ViewChild("newbdate") newbdate;

  @ViewChild("newnationID") newnationID;
  @ViewChild("newaddress") newaddress;
  @ViewChild("newtelephone") newtelephone;
  @ViewChild("newemail") newemail;
  constructor(
    public navCtrl: NavController,
    public alertCtrl: AlertController,
    public navParams: NavParams,
    private http: Http,
    public loading: LoadingController
  ) {
    this.name = this.navParams.get("name");

    this.lastname = this.navParams.get("lastname");
    this.telephone = this.navParams.get("telephone");

    this.bdate = this.navParams.get("bdate");
    this.nationID = this.navParams.get("nationID");

    this.address = this.navParams.get("address");

    this.email = this.navParams.get("email");

    this.username = this.navParams.get("username");
  }
  ionViewWillEnter() {
    this.load();

    console.log(this.navParams.data);
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
      //content: 'Processing please wait...',
    });

    loader.present().then(() => {
      this.http
        .post("http://manocamera.com/api/retrieve_data.php", data, options)

        .map(res => res.json())

        .subscribe(res => {
          loader.dismiss();

          this.items = res.server_response;
          this.telephone = res.server_response[0].telephone;
          this.name = res.server_response[0].name;
          this.lastname = res.server_response[0].lastname;
          this.bdate = res.server_response[0].bdate;
          this.nationID = res.server_response[0].nationID;
          this.address = res.server_response[0].address;

          console.log(this.items);
        });
    });
  }
  Edit() {
    this.username = this.navParams.get("username");

    this.oldnameValue = this.navParams.get("name");
    this.oldlastnameValue = this.navParams.get("lastname");
    this.oldbdateValue = this.navParams.get("bdate");
    this.oldnationIDValue = this.navParams.get("nationID");
    this.oldaddressValue = this.navParams.get("address");

    this.oldTelephoneValue = this.navParams.get("telephone");

    this.oldEmailValue = this.navParams.get("email");

    if (this.newname.value == "") {
      let alert = this.alertCtrl.create({
        title: "ATTENTION",

        subTitle: "กรุณาใส่ชื่อ",

        buttons: ["OK"]
      });

      alert.present();
    } else if (this.newlastname.value == "") {
      let alert = this.alertCtrl.create({
        title: "ATTENTION",

        subTitle: "กรุณาใส่นามสกุล",

        buttons: ["OK"]
      });

      alert.present();
    } else if (this.newbdate.value == "") {
      let alert = this.alertCtrl.create({
        title: "ATTENTION",

        subTitle: "กรุราใส่วันเดือนปีเกิด",

        buttons: ["OK"]
      });

      alert.present();
    } else if (this.newnationID.value == "") {
      let alert = this.alertCtrl.create({
        title: "ATTENTION",

        subTitle: "กรุณาใส่หมายเลขบัตรประชาชน",

        buttons: ["OK"]
      });

      alert.present();
    } else if (this.newaddress.value == "") {
      let alert = this.alertCtrl.create({
        title: "ATTENTION",

        subTitle: "กรุณาใส่ที่อยู่",

        buttons: ["OK"]
      });

      alert.present();
    } else if (this.newtelephone.value == "") {
      let alert = this.alertCtrl.create({
        title: "ATTENTION",

        subTitle: "กรุณาใส่หมายเลขโทรศัพท์",

        buttons: ["OK"]
      });

      alert.present();
    } else if (this.newemail.value == "") {
      let alert = this.alertCtrl.create({
        title: "ATTENTION",

        subTitle: "กรุณาใส่E-mail",

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

        name: this.oldnameValue,
        lastname: this.oldlastnameValue,
        bdate: this.oldbdateValue,
        nationID: this.oldnationIDValue,
        address: this.oldaddressValue,

        telephone: this.oldTelephoneValue,
        email: this.oldEmailValue,

        newname: this.newname.value,
        newlastname: this.newlastname.value,
        newbdate: this.newbdate.value,
        newnationID: this.newnationID.value,
        newaddress: this.newaddress.value,
        newemail: this.newemail.value,
        newtelephone: this.newtelephone.value
      };

      let loader = this.loading.create({
        content: "Processing please wait…"
      });

      loader.present().then(() => {
        this.http
          .post("http://manocamera.com/api/edit_data.php", data, options)

          .map(res => res.json())

          .subscribe(res => {
            loader.dismiss();

            if (res == "data update successfull") {
              let alert = this.alertCtrl.create({
                title: "CONGRATS",

                subTitle: res,

                buttons: ["OK"]
              });

              alert.present();

              //this.navCtrl.push(ContactPage);
            } else {
              let alert = this.alertCtrl.create({
                title: "ERROR",

                subTitle: "Canot update",

                buttons: ["OK"]
              });

              alert.present();
            }
          });
      });
    }
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
