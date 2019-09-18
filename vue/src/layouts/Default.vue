<template>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="scg assignment" />
    <meta name="author" content="uttapong ruangrit" />
    <title>SCG Assignment</title>
  </head>

  <body>
    <b-navbar toggleable="md" type="dark" fixed="top" variant="dark">
      <b-navbar-brand href="#">SCG Assignment</b-navbar-brand>
      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item>
            <router-link :to="{ name: 'home' }" class="nav-link">Restaurant Search</router-link>
          </b-nav-item>
          <b-nav-item>
            <router-link :to="{ name: 'polymial' }" class="nav-link">Polymial</router-link>
          </b-nav-item>
          <b-nav-item>
            <router-link :to="{ name: 'cv' }" class="nav-link">CV</router-link>
          </b-nav-item>
          <b-nav-item>
            <router-link :to="{ name: 'line' }" class="nav-link">LINE Project</router-link>
          </b-nav-item>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>

    <slot />
    <!-- /.container -->

    <!-- Bootstrap core JavaScript
    ==================================================-->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
</template>

<script>
/* ============
 * Default Layout
 * ============
 *
 * Used for the home and account pages.
 *
 * Layouts are used to store a lot of shared code.
 * This way the app stays clean.
 */

export default {
  /**
   * The name of the layout.
   */
  name: "DefaultLayout",

  /**
   * The data that can be used by the page.
   *
   * @returns {Object} The view-model data.
   */
  data() {
    return {
      menuCollapsed: false
    };
  },

  /**
   * The methods that the layout can use.
   */
  methods: {
    /**
     * Will toggle the menu.
     */
    toggleMenu() {
      this.menuCollapsed = !this.menuCollapsed;
    }
  }
};
</script>
