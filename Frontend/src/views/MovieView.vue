<template>
  <Mainbody>
    <div class="movie-main">
      <Aside>
        <div class="movie-info-aside div-comp-white">
          <div class="aside-title title">Information</div>
          <span
            >Year: <span class="info">{{ movieYear }}</span>
          </span>
          <span
            >Duration: <span class="info">{{ movieDuration }}</span></span
          >
          <span>bla bla: <span class="info">yoo</span></span>
        </div>
      </Aside>
      <section class="div-comp movie-details">
        <div class="div-comp-white movie-comp">
          <div class="title m-title">Title:</div>
          <div class="title score">Score: {{ movieScore }} | 10</div>
        </div>
        <div class="dropdown-group">
          <div class="add-category">
            <ModalForm class="dropdown-item add-category-item" />
            <Dropdown
              class="dropdown-item add-category-item"
              :list="ListCategory"
              :category="true"
              placeholder="Select a List"
            ></Dropdown>
          </div>

          <Dropdown
            class="dropdown-item"
            :list="ListRatings"
            :category="false"
            placeholder="Select a Rating"
          ></Dropdown>
        </div>
        <div class="div-comp-white synopsis">
          <div class="title synopsis-title">Synopsis:</div>
          <div class="synopsis-body">
            {{ movieSynopsis }}
          </div>
        </div>
      </section>
    </div>
  </Mainbody>
</template>
<script>
import Mainbody from '@/components/Mainbody.vue'
import Dropdown from '@/components/Dropdown.vue'
import ModalForm from '@/components/ModalForm.vue'
import Aside from '@/components/Aside.vue'

export default {
  name: 'MovieView',
  components: {
    Mainbody,
    Dropdown,
    ModalForm,
    Aside,
  },
  data() {
    return {
      ListCategory: [
        { id: 1, listName: 'Marvel' },
        { id: 2, listName: 'roror' },
      ],
      ListRatings: [
        { id: 1, listName: '1' },
        { id: 2, listName: '2' },
        { id: 3, listName: '3' },
        { id: 4, listName: '4' },
        { id: 5, listName: '5' },
        { id: 6, listName: '6' },
        { id: 7, listName: '7' },
        { id: 8, listName: '8' },
        { id: 9, listName: '9' },
        { id: 10, listName: '10' },
      ],
      movieSynopsis:
        'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, maiores vero. Illo ipsa repudiandae accusantium beatae cupiditate id quisquam inventore minus? Ullam aperiam eaque reprehenderit harum natus temporibus sit voluptate, excepturi eius ipsam. Quaerat corrupti quas totam repellat vero inventore provident! Perferendis maiores culpa deserunt fugit, cum ab labore. Quas incidunt id consequatur, dignissimos unde, veniam amet pariatur dolorem hic mollitia, saepe alias aspernatur tempore ducimus. Commodi, expedita harum mollitia culpa aspernatur unde aliquid quidem suscipit optio molestias alias iure autem facilis consequatur corrupti debitis accusamus aut possimus cupiditate. Quaerat corporis neque hic quibusdam omnis earum ex facere ab. Odit?',
      movieDuration: '1h 30min',
      movieScore: 9,
      movieYear: 2000,
    }
  },
}
</script>
<style scoped>
.movie-main {
  margin: 1.5rem 1rem;
  display: flex;
  justify-content: space-around;
}
.movie-details {
  width: 70%;
  display: flex;
  flex-direction: column;
  padding: 1rem;
}
.movie-info-aside {
  margin: 1rem 2rem;
  padding: 0.7rem 0.7rem 0.7rem 0.7rem;
  min-height: 15rem;
  display: flex;
  flex-direction: column;
}
.movie-info-aside > span {
  padding-top: 0.5em;
  font-weight: 400px;
  color: var(--color-black);
}
.info {
  color: var(--color-grey);
}
.movie-comp {
  padding: 2rem;
  margin: 1rem 0;
}
.score {
  border: none;
  font-size: 1.5em;
}
.m-title {
  font-size: 2.5em;
}
.dropdown-group {
  display: flex;
  justify-content: flex-start;
}
.dropdown-item {
  margin: 0 1rem;
}
.add-category {
  display: flex;
}
.add-category-item {
  margin: 0;
  padding-inline: 5px;
}
.synopsis {
  margin: 1rem 0;
  padding: 2rem;
  height: fit-content;
}
.synopsis-body {
  font-size: 1.2em;
  color: var(--color-black);
}
</style>
