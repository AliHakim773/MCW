<template>
  <tr>
    <td class="t-rank">{{ rank }}</td>
    <td class="t-name">
      <div class="td-name">
        <img src="../../../public/Lissa.png" class="t-img" />
        <span>{{ name }}</span>
      </div>
    </td>
    <td class="t-score">{{ userScore }}</td>
    <td class="t-score">{{ avgScore }}</td>
  </tr>
</template>
<script>
export default {
  name: 'TopMoviesRow',
  props: ['rank', 'name', 'imgSrc', 'userScore', 'avgScore'],
}
</script>
