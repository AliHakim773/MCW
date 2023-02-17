<template>
  <div class="review-small">
    <figure><img class="review-img" :src="imgLink" /></figure>
    <div class="review-details">
      <div class="review-title-rating">
        <span class="review-title">{{ title }}</span>
        <span class="review-rating">{{ rating }}</span>
      </div>
      <div class="review-status">{{ status }}</div>
      <div class="review-content">{{ checkedcontent }}</div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'ReviewSmall',
  data(){
    return{

    }
  },
  props: ['title', 'status', 'rating', 'content', 'imgLink'],
  computed: {
    checkedcontent() {
      if (this.content.length > 100)
        return removeLastWord(this.content.slice(0, 100)) + '...'
      else return this.content
    },
  },
  created() {

  }
}

function removeLastWord(str) {
  const lastIndexOfSpace = str.lastIndexOf(' ')

  if (lastIndexOfSpace === -1) {
    return str
  }

  return str.substring(0, lastIndexOfSpace)
}
</script>
<style scoped>
.review-small {
  display: flex;
  justify-content: flex-start;
}
.review-img {
  width: 75px;
  height: 90px;
  object-fit: cover;
  border-radius: 0.3rem;
}
.review-details {
  width: 70%;
  padding: 0.5rem;
  font-weight: 400;
}
.review-title {
  color: var(--primary-color);
  font-weight: 500;
}
.review-status {
  color: var(--color-black);
}
.review-title-rating {
  display: flex;
  justify-content: space-between;
}
.review-rating {
  color: var(--color-grey);
}
.review-content {
  color: var(--color-black);
  font-size: 14px;
}
</style>
