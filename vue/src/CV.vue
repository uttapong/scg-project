<template>
  <b-container fluid>
    <b-row>
      <Sidebar/>
      <div class="scg-map">
        <div id="doc2" class="scg-t7">
          <div id="inner">
            <div id="hd">
              <div class="scg-gc">
                <div class="scg-u first">
                  <h1>Uttapong Ruangrit</h1>
                  <h2>Full Stack Developer</h2>
                </div>
                <div class="scg-u last">
                  <img
                    class="img-circle"
                    src="https://www.uttapong.com/assets/img/portrait_square.jpg"
                    width="100"
                    height="100"
                  >
                </div>

                <div class="scg-u">
                  <div class="contact-info">
                    <h3>
                      <a href="mailto:uttapong@gmail.com">uttapong@gmail.com</a>
                    </h3>
                    <h3>(+66) - 0894852280</h3>
                  </div>
                  <!--// .contact-info -->
                </div>
              </div>
              <!--// .scg-gc -->
            </div>
            <!--// hd -->

            <div id="bd">
              <div id="scg-main">
                <div class="scg-b">
                  <div class="scg-gf">
                    <div class="scg-u first">
                      <h2>Profile</h2>
                    </div>
                    <div class="scg-u">
                      <p
                        class="enlarge"
                      >I'm full stack web developer with 12 years of professional experience. I'm interested in new technologies of software development frameworks or methods and new graphics design trend and my major focus is on improving development process. Love UX and UI design.</p>
                    </div>
                  </div>
                  <!--// .scg-gf -->

                  <div class="scg-gf">
                    <div class="scg-u first">
                      <h2>Skills</h2>
                    </div>
                    <div class="scg-u">
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
                    </div>
                  </div>
                  <!--// .scg-gf -->

                  <div class="scg-gf">
                    <div class="scg-u first">
                      <h2>Technical</h2>
                    </div>
                    <div class="scg-u">
                      <ul class="talent">
                        <li>PHP/NodeJS/Python</li>
                        <li>html/css/sass/less</li>
                        <li class="last">VueJS/React/Angular</li>
                      </ul>

                      <ul class="talent">
                        <li>MySQl/Mongo/Redis</li>
                        <li>GCP/Firebase</li>
                        <li class="last">AWS</li>
                      </ul>

                      <ul class="talent">
                        <li>UI Design</li>
                        <li>GraphQL, Apollo:</li>
                        <li class="last">Android/iOS (Basic)</li>
                      </ul>
                    </div>
                  </div>
                  <!--// .scg-gf-->

                  <div class="scg-gf">
                    <div class="scg-u first">
                      <h2>Experience</h2>
                    </div>
                    <!--// .scg-u -->

                    <div class="scg-u">
                      <div class="job">
                        <h2>WAYLAR Tech</h2>
                        <h3>R&D Team Lead</h3>
                        <h4>2018-Current</h4>
                        <p>Mentoring core company software on UX and architecture, an Telematics/IoT logistics platform development (WAYLAR Flow) on GCP, Company’s backoffice architecture design and development, Implement robust development process with agile,manage timeline and coninuely deliver tasks while working closely with BD on complex requirement.</p>
                      </div>

                      <div class="job">
                        <h2>Tencent (Thailand)</h2>
                        <h3>Lead Enginee1</h3>
                        <h4>2015-2018</h4>
                        <p>Joox Music Apps, iPick, Product campaign, various of game on both front-end and back-end development, Online payment</p>
                      </div>

                      <div class="job">
                        <h2>BIOTEC, NSTDA</h2>
                        <h3>Research Assistant</h3>
                        <h4>2013-2015</h4>
                        <p>Develop Bioinformatics Tools (Thalassemia Interpreation Tools, Mutation Annotation Tools) and High performance computer adminstration.</p>
                      </div>

                      <div class="job last">
                        <h2>Ringzero</h2>
                        <h3>Software Engineer</h3>
                        <h4>2012-2013</h4>
                        <p>Develop and maintenance in-house software to support Bank process. Achievement: National Bureu Credits Checking System, iChecker-An integrated system of mobile app and web application to check customer information. Branch Profile-Branch information application, Branch Activity-Application to records working logs for all employees.</p>
                      </div>
                    </div>
                    <!--// .scg-u -->
                  </div>
                  <!--// .scg-gf -->

                  <div class="scg-gf last">
                    <div class="scg-u first">
                      <h2>Education</h2>
                    </div>
                    <div class="scg-u">
                      <h2>Sirindhorn International Institute of Technology (SIIT), Thammasat University</h2>
                      <h3>
                        Information Technology, Master of Science
                        <strong>2011</strong>
                      </h3>
                    </div>
                    <div class="scg-u">
                      <h2>Thammasat University</h2>
                      <h3>
                        Computer Engineering, Bachelor of Engineer
                        <strong>2006</strong>
                      </h3>
                    </div>
                  </div>
                  <!--// .scg-gf -->
                </div>
                <!--// .scg-b -->
              </div>
              <!--// scg-main -->
            </div>
            <!--// bd -->

            <div id="ft">
              <p>
                Uttapong Ruangrit &mdash;
                <a href="mailto:uttapong@gmail.com">uttapong@gmail.com</a>
              </p>
            </div>
            <!--// footer -->
          </div>
          <!-- // inner -->
        </div>
        <!--// doc -->
      </div>
    </b-row>
  </b-container>
</template>

<script>
import Sidebar from "./components/Sidebar";
import "./assets/cv.css";
export default {
  components: {
    Sidebar
  }
};
</script>
