import { Component, ViewChild } from "@angular/core";
import {
  IonicPage,
  NavController,
  NavParams,
  AlertController,
  DateTime
} from "ionic-angular";
import { Http, Headers, RequestOptions } from "@angular/http";
import { LoadingController } from "ionic-angular";

import { Camera, CameraOptions } from "@ionic-native/camera";
import {
  FileTransfer,
  FileUploadOptions,
  FileTransferObject
} from "@ionic-native/file-transfer";
import { File } from "@ionic-native/file";
import { dateDataSortValue } from "ionic-angular/umd/util/datetime-util";

/**
 * Generated class for the UpimagePage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@Component({
  selector: "page-upimage",
  templateUrl: "upimage.html"
})
export class UpimagePage {
  information: any[];
  items1: any = [];
  items: any = [];
  data: any;
  telephone: any;
  username: any;
  nationID: any;
  imageSrc: any;
  myphoto: any;
  @ViewChild("newtelephone") newtelephone;
  @ViewChild("newemail") newemail;

  constructor(
    public loading: LoadingController,
    public navCtrl: NavController,
    public alertCtrl: AlertController,
    public navParams: NavParams,
    private http: Http,
    private camera: Camera,
    private transfer: FileTransfer,
    private file: File,
    private loadingCtrl: LoadingController
  ) {
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
        .post("http://manocamera.com/api/fetchphoto.php", data, options)

        .map(res => res.json())

        .subscribe(res => {
          loader.dismiss();

          this.items = res.server_response;

          console.log(this.items);
        });
    });

    this.http
      .get("assets/information.json")
      .map(res => res.json())
      .subscribe(data => {
        this.items1 = data["data"];
      });
  }
  ionViewDidLoad() {
    console.log("ionViewDidLoad UpimagePage");
    console.log(this.navParams.data);
  }

  takePhoto() {
    const options: CameraOptions = {
      quality: 100,
      destinationType: this.camera.DestinationType.DATA_URL,
      encodingType: this.camera.EncodingType.JPEG,
      mediaType: this.camera.MediaType.PICTURE
    };

    this.camera.getPicture(options).then(
      imageData => {
        // imageData is either a base64 encoded string or a file URI
        // If it's base64:
        this.myphoto = "data:image/jpeg;base64," + imageData;
      },
      err => {
        // Handle error
      }
    );
  }

  getImage() {
    const options: CameraOptions = {
      quality: 100,
      destinationType: this.camera.DestinationType.DATA_URL,
      sourceType: this.camera.PictureSourceType.PHOTOLIBRARY,
      saveToPhotoAlbum: false
    };

    this.camera.getPicture(options).then(
      imageData => {
        // imageData is either a base64 encoded string or a file URI
        // If it's base64:
        this.myphoto = "data:image/jpeg;base64," + imageData;
      },
      err => {
        // Handle error
      }
    );
  }

  cropImage() {
    const options: CameraOptions = {
      quality: 100,
      destinationType: this.camera.DestinationType.DATA_URL,
      sourceType: this.camera.PictureSourceType.PHOTOLIBRARY,
      saveToPhotoAlbum: false,
      allowEdit: true,
      targetWidth: 300,
      targetHeight: 300
    };

    this.camera.getPicture(options).then(
      imageData => {
        // imageData is either a base64 encoded string or a file URI
        // If it's base64:
        this.myphoto = "data:image/jpeg;base64," + imageData;
      },
      err => {
        // Handle error
      }
    );
  }

  uploadImage() {
    //Show loading
    let loader = this.loadingCtrl.create({
      content: "Uploading..."
    });
    loader.present();
    this.username = this.navParams.get("username");
    //create file transfer object
    const fileTransfer: FileTransferObject = this.transfer.create();

    //random int

    var username = this.username;
    var random = Math.floor(Math.random() * 100);
    var today = new Date().toISOString();
    //option transfer
    let options: FileUploadOptions = {
      fileKey: "photo",
      fileName: "myImage_" + random + today + ".jpg",
      chunkedMode: false,
      httpMethod: "post",
      mimeType: "image/jpeg",
      headers: {},
      params: {
        username: username

        // the rest of your form fields go here, except photo
      }
    };

    //file transfer action
    fileTransfer
      .upload(this.myphoto, "http://www.manocamera.com/uploadFoto.php", options)
      .then(
        data => {
          alert("Success");
          loader.dismiss();
        },
        err => {
          console.log(err);
          alert("Error");
          loader.dismiss();
        }
      );
  }
  uploadImage2() {
    //Show loading
    let loader = this.loadingCtrl.create({
      content: "Uploading..."
    });
    loader.present();
    this.username = this.navParams.get("username");
    //create file transfer object
    const fileTransfer: FileTransferObject = this.transfer.create();

    //random int

    var username = this.username;
    var random = Math.floor(Math.random() * 100);
    var today = new Date().toISOString();
    //option transfer
    let options: FileUploadOptions = {
      fileKey: "photo",
      fileName: "myImage_" + random + today + ".jpg",
      chunkedMode: false,
      httpMethod: "post",
      mimeType: "image/jpeg",
      headers: {},
      params: {
        username: username

        // the rest of your form fields go here, except photo
      }
    };

    //file transfer action
    fileTransfer
      .upload(
        this.myphoto,
        "http://www.manocamera.com/uploadFoto2.php",
        options
      )
      .then(
        data => {
          alert("Success");
          loader.dismiss();
        },
        err => {
          console.log(err);
          alert("Error");
          loader.dismiss();
        }
      );
  }
  uploadImage3() {
    //Show loading
    let loader = this.loadingCtrl.create({
      content: "Uploading..."
    });
    loader.present();
    this.username = this.navParams.get("username");
    //create file transfer object
    const fileTransfer: FileTransferObject = this.transfer.create();

    //random int

    var username = this.username;
    var random = Math.floor(Math.random() * 100);
    var today = new Date().toISOString();
    //option transfer
    let options: FileUploadOptions = {
      fileKey: "photo",
      fileName: "myImage_" + random + today + ".jpg",
      chunkedMode: false,
      httpMethod: "post",
      mimeType: "image/jpeg",
      headers: {},
      params: {
        username: username

        // the rest of your form fields go here, except photo
      }
    };

    //file transfer action
    fileTransfer
      .upload(
        this.myphoto,
        "http://www.manocamera.com/uploadFoto3.php",
        options
      )
      .then(
        data => {
          alert("Success");
          loader.dismiss();
        },
        err => {
          console.log(err);
          alert("Error");
          loader.dismiss();
        }
      );
  }

  load() {
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
        .post("http://manocamera.com/api/fetchphoto.php", data, options)

        .map(res => res.json())

        .subscribe(res => {
          loader.dismiss();

          this.items = res.server_response;

          console.log(this.items);
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
