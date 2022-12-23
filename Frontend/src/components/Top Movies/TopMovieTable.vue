<template>
  <table class="table">
    <tr>
      <th class="t-rank">Rank</th>
      <th class="t-name">Movie</th>
      <th class="t-score">Your Score</th>
      <th class="t-score">{{ movies[0].name }}</th>
    </tr>
    <TableRow
      v-for="(m, index) in movies"
      :key="index"
      :rank="index + 1"
      :name="m.name"
      :imgSrc="m.imgSrc"
      :avgScore="m.avgScore"
      :userScore="m.userScore"
    />
  </table>
</template>
<script>
import TableRow from '@/components/Top Movies/TopMoviesRow.vue'

export default {
  name: 'TopMovieTable',
  props: ['movies'],
  components: {
    TableRow,
  },
}
</script>
<style>
.table,
th,
tr,
td {
  border-collapse: collapse;
  vertical-align: middle;
}

.table {
  width: 100%;
}
.t-rank,
.t-score {
  width: 10%;
}
.t-name {
  width: auto;
}
.t-img {
  height: 7rem;
  width: 5rem;
  object-fit: cover;
  display: inline;
  margin: 0 1rem 0 0;
}
.t-center {
  display: flex;
  justify-content: center;
  justify-items: center;
  height: 100%;
}
.td-name {
  display: flex;
  align-items: center;
}
</style>
