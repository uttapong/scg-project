<template>
  <v-layout>
    <b-container fluid>
      <b-row>
        <div class="scg-map pad">
          <b-row>
            <b-col col lg="12" cols="12" class="scg-container justify-content-left">
              <h1 class="mb-3">Restaurant search on LINE</h1>
              <h2>How to subscribe</h2>

              <ol>
                <li>
                  Add LINE bot account @459mmroz or by using QRCode.
                  <br />
                  <img src="../../../public/qrcode.png" class="qr" />
                </li>
                <li>Type location keyword to search for nearby restaurants.</li>
                <li>
                  <!-- Place this tag where you want the button to render. -->

                  <github-button
                    href="https://github.com/uttapong/scg-test-line/archive/master.zip"
                    data-icon="octicon-cloud-download"
                    data-size="large"
                    aria-label="Download uttapong/scg-test-line on GitHub"
                  >Download from Github</github-button>
                </li>
              </ol>
            </b-col>
          </b-row>
        </div>
      </b-row>
    </b-container>
  </v-layout>
</template>

<script>
import "../../assets/cv.css";
import "../../assets/global.css";
import GithubButton from "vue-github-button";
import VLayout from "@/layouts/Default.vue";

export default {
  components: {
    GithubButton,
    VLayout
  }
};
</script>
<style scoped>
.scg-container {
  padding: 50px 30px 10px 40px;
  text-align: left;
}
.scg-container li {
  line-height: 1.6rem;
}
.qr {
  width: 150px;
}
</style>
