<template>
  <div v-if="this.showLinks" class="links-group">
    <div v-for="link in this.links" :key="link.shortname" class="link-item">
      <a v-if="link.type === 'url'" :href="link.url" target="_blank">
        <img :src="link.img" :alt="link.shortname" class="link" />
      </a>
      <a v-if="link.type === 'download'" :href="link.filepath" :download="'gill-hawkes-cv.pdf'">
        <img :src="link.img" :alt="link.shortname" class="link" />
      </a>
      <a v-if="link.type === 'sms'" :href="link.href">
        <img :src="link.img" :alt="link.shortname" class="link" />
      </a>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: "LinksModule",
  props: {},
  data () {
    return {
      showLinks: true,
      links: [
        {
          shortname: "Github",
          url: "https://www.github.com/gillhawkes1",
          img: "/images/github.png",
          type: 'url'
        },
        {
          shortname: "Linkedin",
          url: "https://www.linkedin.com/in/gill-hawkes/",
          img: "/images/linkedin.png",
          type: 'url'
        },
        {
          shortname: "Gmail",
          url: this.createEmailLink(),
          img: "/images/gmail.png",
          type: 'url'
        },
        {
          shortname: "Discord",
          url: "https://discord.com/users/332685115606171649",
          img: "/images/discord.png",
          type: 'url'
        },
        {
          shortname: "CV",
          filepath: "/files/gill-hawkes-cv.pdf",
          img: "/images/cv.png",
          type: 'download'
        },
        {
          shortname: "SMS",
          href: this.createSMS(),
          img: "/images/message.png",
          type: 'sms'
        },
      ],
    }
  },
  methods: {
    getLinks() {
      axios.get('/api/public/endpoints/getLinks.php').then(response => {
        //this.links = response.data;
        console.log(response)
      }).catch(error => {
        console.log(error);
      });
    },
    createEmailLink() {
      const myEmail = 'gillhawkes1@gmail.com';
      const subj = encodeURIComponent('I clicked this link on thehawkesnest.com and wanted to email you!');
      const gmailLink = `https://mail.google.com/mail/?view=cm&to=${myEmail}&su=${subj}`;
      return gmailLink;
    },
    createSMS() {
      const pn = '+13363149164';
      const msg = 'Hey, Gill! '
      const promptSMS = `sms:${pn}?body=${msg}`;
      return promptSMS;
    }
  },
  mounted() {
    //this.getLinks();
    //console.log(this.links)
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.link {
  height: 75px;
  width: 75px;
}
.links-group {
  display: flex;
  text-align: center;
  justify-content: center;
}
.link-item {
  padding: 50px;
}

/* phone styling */
@media (max-width: 600px) {
  .links-group {
    flex-direction: row;
    overflow-wrap: break-word;
  }

  .link-item {
    margin: 5px;
    padding: 7px;
  }
  .link {
    height: 35px;
    width: 35px;
  }
}
</style>
