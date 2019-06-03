<template>
  <b-container fluid>
    <b-row>
      <Sidebar/>
      <div class="scg-map">
        <b-row>
          <b-col col lg="12" cols="12" class="scg-container justify-content-left">
            <h1 class="mb-3">Polymial Calculator</h1>
            <input
              v-model="numCount"
              type="text"
              class="form-control"
              placeholder="Enter Number"
              required
              autofocus
            >
            <p class="result">
              <b-badge
                class="result-ele"
                v-for="(num,index) in result"
                :key="index"
                href="#"
                variant="dark"
              >{{num}}</b-badge>
            </p>
          </b-col>
        </b-row>
      </div>
    </b-row>
  </b-container>
</template>

<script>
import Sidebar from "./components/Sidebar";
import "./assets/restaurant.css";
export default {
  components: {
    Sidebar
  },
  data: function() {
    return {
      numCount: 0,
      result: []
    };
  },
  methods: {
    calculate() {
      for (let i = 0; i < this.numCount; i++) {
        this.result.push(3 + i + i * i);
      }
    }
  },
  watch: {
    numCount: function() {
      this.result = [];
      this.calculate();
    }
  }
};
</script>
<style scoped>
.scg-container {
  padding: 50px 30px 10px 40px;
  text-align: left;
}
.scg-container input {
  width: 200px;
}
.scg-container .result {
  margin-top: 20px;
  font-size: 1.4rem;
}
.result-ele {
  margin-right: 8px;
  margin-top: 10px;
}
</style>
