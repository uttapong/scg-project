/* ============
 * Routes File
 * ============
 *
 * The routes and redirects are defined in this file.
 */

export default [
  {
    path: "/",
    component: () => import("@/views/Home/Index.vue"),
    name: "home"
  },
  {
    path: "/polymial",
    component: () => import("@/views/Polymial/Index.vue"),
    name: "polymial"
  },
  { path: "/cv", component: () => import("@/views/CV/Index.vue"), name: "cv" },
  {
    path: "/lineproject",
    component: () => import("@/views/Line/Index.vue"),
    name: "line"
  }
];
