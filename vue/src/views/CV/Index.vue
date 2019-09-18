<template>
  <v-layout>
    <b-container fluid class="pad cv-pad">
      <b-row>
        <b-col cols="12" md="6">
          <h1>Uttapong Ruangrit</h1>
          <h2>Full Stack Developer</h2>
        </b-col>
        <b-col cols="12" md="6" class="text-right">
          <img
            class="img-circle"
            src="../../../public/portrait_square.jpg"
            width="100"
            height="100"
          />

          <div class="contact-info">
            <h3>
              <a href="mailto:uttapong@gmail.com">uttapong@gmail.com</a>
            </h3>
            <h3>(+66) - 0894852280</h3>
          </div>
        </b-col>
      </b-row>
      <b-row>
        <b-col cols="12" md="3">
          <h2>Profile</h2>
        </b-col>
        <b-col cols="12" md="9">
          <p>I'm full stack web developer with 12 years of professional experience. I'm interested in new technologies of software development frameworks or methods and new graphics design trend and my major focus is on improving development process. Love UX and UI design.</p>
        </b-col>
        <b-col cols="12" md="3">
          <h2>Skills</h2>
        </b-col>
        <b-col cols="12" md="9">
          <div class="talent">
            <h2>Software Development</h2>
            <p>12 years in the industry and proficiency in major programing languages</p>
          </div>

          <div class="talent">
            <h2>Architecture Design</h2>
            <p>Capture complex requirements and design robust SOA scalable architecture.</p>
          </div>

          <div class="talent">
            <h2>UX/UI Design</h2>
            <p>Love research on new UI Trend and willing to conduct UX Research</p>
          </div>
        </b-col>

        <b-col cols="12" md="3">
          <h2>Technical</h2>
        </b-col>
        <b-col cols="12" md="3">
          <ul class="talent">
            <li>PHP/NodeJS/Python</li>
            <li>html/css/sass/less</li>
            <li class="last">VueJS/React/Angular</li>
          </ul>
        </b-col>
        <b-col cols="12" md="3">
          <ul class="talent">
            <li>MySQl/Mongo/Redis</li>
            <li>GCP/Firebase</li>
            <li class="last">AWS</li>
          </ul>
        </b-col>
        <b-col cols="12" md="3">
          <ul class="talent">
            <li>UI Design</li>
            <li>GraphQL, Apollo:</li>
            <li class="last">Android/iOS (Basic)</li>
          </ul>
        </b-col>
      </b-row>
      <b-row>
        <b-col cols="12" md="3">
          <h2>Experience</h2>
        </b-col>
        <b-col cols="12" md="9">
          <div class="job">
            <h4>FWD Thailand Co.,Ltd Tech</h4>
            <h5>Digital Development Manager</h5>
            <h4>2019-Current</h4>
            <p>Enforce objectives and strategies for digital development all platforms including website, mobile application and social network integration. Manage and work closely with local IT and external partnerships, FWD local IT contractors and third party technology vendors.</p>
          </div>

          <div class="job">
            <h4>WAYLAR Tech</h4>
            <h5>R&D Team Lead</h5>
            <h4>2018-2019</h4>
            <p>Mentoring core company software on UX and architecture, an Telematics/IoT logistics platform development (WAYLAR Flow) on GCP, Company’s backoffice architecture design and development, Implement robust development process with agile,manage timeline and coninuely deliver tasks while working closely with BD on complex requirement.</p>
          </div>

          <div class="job">
            <h4>Tencent (Thailand)</h4>
            <h5>Lead Engineer</h5>
            <h4>2015-2018</h4>
            <p>Joox Music Apps, iPick, Product campaign, various of game on both front-end and back-end development, Online payment</p>
          </div>

          <div class="job">
            <h4>BIOTEC, NSTDA</h4>
            <h5>Research Assistant</h5>
            <h4>2013-2015</h4>
            <p>Develop Bioinformatics Tools (Thalassemia Interpreation Tools, Mutation Annotation Tools) and High performance computer adminstration.</p>
          </div>

          <div class="job last">
            <h4>Ringzero</h4>
            <h5>Software Engineer</h5>
            <h4>2012-2013</h4>
            <p>Develop and maintenance in-house software to support Bank process. Achievement: National Bureu Credits Checking System, iChecker-An integrated system of mobile app and web application to check customer information. Branch Profile-Branch information application, Branch Activity-Application to records working logs for all employees.</p>
          </div>
        </b-col>
      </b-row>
      <b-row>
        <b-col cols="12" md="3">
          <h2>Education</h2>
        </b-col>
        <b-col cols="12" md="9">
          <div class="scg-u">
            <h4>Sirindhorn International Institute of Technology (SIIT), Thammasat University</h4>
            <p>
              Information Technology, Master of Science
              <strong>2011</strong>
            </p>
          </div>
          <div class="scg-u">
            <h4>Thammasat University</h4>
            <p>
              Computer Engineering, Bachelor of Engineer
              <strong>2006</strong>
            </p>
          </div>
        </b-col>
      </b-row>
      <b-row>
        <b-col cols="12" md="12">
          <div id="ft">
            <p>
              Uttapong Ruangrit &mdash;
              <a href="mailto:uttapong@gmail.com">uttapong@gmail.com</a>
            </p>
          </div>
        </b-col>
      </b-row>
    </b-container>
  </v-layout>
</template>

<script>
import "../../assets/cv.css";
import "../../assets/global.css";
import VLayout from "@/layouts/Default.vue";
export default {
  components: { VLayout }
};
</script>
