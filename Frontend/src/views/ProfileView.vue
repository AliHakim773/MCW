<template>
  <Mainbody>
    <div class="profile-main">
      <Aside
        ><div class="div-comp-white profile-info-aside">
          <div class="profile-aside-info-user">
            <div class="title">Information</div>
            <div>Age: 18</div>
            <div>Gender: male</div>
            <div>Age: 18</div>
          </div>
          <button class="btn profile-btn">Add To List</button>
        </div>
        <div class="profile-followed-users div-comp-white">
          <div class="title profile-followed-header">
            <span>Followed Users</span>
            <router-link class="view-all" to="/friends">view all</router-link>
          </div>
          <div class="followed-users">
            <img src="../../public/Lissa.png" title="hello" />
            <img src="../../public/Lissa.png" alt="" />
            <img src="../../public/Lissa.png" alt="" />
            <img src="../../public/Lissa.png" alt="" />
            <img src="../../public/Lissa.png" alt="" />
            <img src="../../public/Lissa.png" alt="" />
            <img src="../../public/Lissa.png" alt="" />
          </div>
        </div>
      </Aside>
      <section class="div-comp profile-details">
        <div class="div-comp-white profile-comp">
          <div class="title">{{ username }}</div>
          <p class="userDescription">{{ userDescription }}</p>
        </div>
        <div class="div-comp-white list-stats">
          <div class="lists-info">
            <div class="stats-title">List Stats</div>
            <div class="stats-content">
              <div>Total entries:</div>
              <div v-for="i in categoryList" :key="i.id">
                {{ i.name }}: {{ i.number }}
              </div>
            </div>
          </div>
          <div class="recent-updates">
            <div class="stats-title">Latest Additions</div>
            <div class="status-content">
              <ListItemSmall
                class="list-items-small"
                v-for="i in latestAdditions"
                :date="i.date"
                :status="i.category"
                :title="i.title"
                :key="i.id"
              ></ListItemSmall>
            </div>
          </div>
        </div>
      </section></div
  ></Mainbody>
</template>
<script>
import Mainbody from '@/components/Mainbody.vue'
import Aside from '@/components/Aside.vue'
import ListItemSmall from '@/components/ListItemSmall.vue'

export default {
  name: 'ProfileView',
  components: {
    Mainbody,
    Aside,
    ListItemSmall,
  },
  data() {
    return {
      username: 'Username',
      userDescription:
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, dolorem nisi. Dolores, asperiores corporis! Architecto, deleniti facilis quod nemo porro sit, vel laboriosam ab incidunt beatae, voluptatum temporibus aspernatur corporis.',
      latestAdditions: [
        {
          id: 0,
          title: 'IDC',
          date: '20-20-2020',
          category: 'baaaaad',
        },
        {
          id: 1,
          title: 'IDC',
          date: '20-20-2020',
          category: 'baaaaad',
        },
        {
          id: 2,
          title: 'IDC',
          date: '20-20-2020',
          category: 'baaaaad',
        },
        {
          id: 3,
          title: 'IDC',
          date: '20-20-2020',
          category: 'baaaaad',
        },
      ],
      categoryList: [
        {
          id: 1,
          name: 'blabla',
          number: 30,
        },
        {
          id: 2,
          name: 'Umaru-chan',
          number: 30,
        },
        {
          id: 3,
          name: 'Cypher',
          number: 30,
        },
        {
          id: 4,
          name: 'BlackSea-sama',
          number: 30,
        },
      ],
    }
  },
}
</script>
<style scoped>
.profile-main {
  margin: 1.5rem 1rem;
  display: flex;
  justify-content: space-around;
}
.profile-details {
  width: 70%;
  display: flex;
  flex-direction: column;
  padding: 1rem 1.5rem;
}
.profile-comp {
  padding: 2rem;
  margin: 1rem 0;
}
.userDescription {
  font-size: 1.7em;
  font-weight: 400;
}
.list-stats {
  display: flex;
  justify-content: space-around;
  padding: 1rem;
}
.lists-info {
  width: 50%;
}
.recent-updates {
  width: 50%;
}
.stats-title {
  border-bottom: 1px solid var(--color-grey);
  margin-bottom: 1rem;
  font-size: 1.4em;
  font-weight: 500;
  color: var(--color-black);
}
.stats-content {
  display: flex;
  flex-direction: column;
}
.stats-content div {
  font-size: 1.15em;
  margin: 0.3rem 0;
}
.list-items-small {
  margin: 0.3rem 0;
}
.profile-info-aside,
.profile-followed-users {
  margin: 1rem 2rem;
  padding: 0.7rem 0.7rem 0.7rem 0.7rem;
  display: flex;
  min-height: 15rem;
  flex-direction: column;
  justify-content: space-between;
}
.profile-aside-info-user {
  display: flex;
  flex-direction: column;
}
.profile-btn {
  margin-top: auto;
  border: 1px solid var(--primary-color);
  background-color: var(--color-white);
}
.profile-btn:hover {
  background-color: var(--primary-color);
  color: var(--color-white);
}
.followed-users {
  display: flex;
  flex-wrap: wrap;
}
.followed-users img {
  height: 7rem;
  width: 23%;
  margin: 1%;
  object-fit: cover;
}
.view-all {
  font-size: 0.6em;
  font-weight: 500;
  color: var(--primary-color);
}
.view-all:hover {
  color: var(--color-black);
}
.profile-followed-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
}
</style>

//TODO(ALiHakim): add favorite movie
