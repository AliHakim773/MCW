<template>
  <footer>
    <div class="footer-container line">
      <span>Follow us on:</span
      ><a href="#"
        ><font-awesome-icon class="icon" icon="fa-brands fa-facebook"
      /></a>
      <a href="#"
        ><font-awesome-icon class="icon" icon="fa-brands fa-discord"
      /></a>
      <a href="#"
        ><font-awesome-icon class="icon" icon="fa-brands fa-twitter"
      /></a>
      <a href="#"
        ><font-awesome-icon class="icon" icon="fa-brands fa-instagram"
      /></a>
      <a href="#"
        ><font-awesome-icon class="icon" icon="fa-brands fa-tiktok"
      /></a>
    </div>
    <div class="footer-container">
      <a href="#" class="footer-link"> Home </a>
      <a href="#" class="footer-link"> Home </a>
      <a href="#" class="footer-link"> Home </a>
      <a href="#" class="footer-link"> Home </a>
    </div>

    <div class="footer-container">
      MyComunityWebsite is a property of MCW Co.,Ltd. ©{{ year }} All Rights
      Reserved.
    </div>
    <div class="footer-container made-by">
      Frontend and backend made by Ali Hakim & Ali Mroueh
    </div>
  </footer>
</template>
<script>
export default {
  name: 'MainFooter',
  data() {
    return {
      year: new Date().getFullYear(),
    }
  },
}
</script>
<style scoped>
footer {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  color: var(--color-white);
  background-color: var(--color-black);
  padding: 3rem;
}
.footer-container {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 50%;
  padding: 2rem;
}
.line {
  position: relative;
}
.line::after {
  position: absolute;
  content: '';
  height: 1px;
  bottom: 0;
  width: 100%;
  border-radius: 100%;
  background-color: var(--color-white);
}
.icon {
  font-size: 1.8em;
  margin: 0 0.5em;
}
.footer-link {
  padding: 0 1em;
  border-left: 1px solid var(--color-white);
}
.footer-link:first-child {
  border: none;
}
footer a {
  color: var(--color-white);
  text-decoration: none;
}
.made-by {
  color: var(--color-grey);
  font-size: small;
  padding-top: 0 !important;
}
</style>
