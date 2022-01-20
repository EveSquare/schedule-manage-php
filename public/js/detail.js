
Vue.use(VTooltip);

Vue.component('comment', {
  delimiters: ['[[', ']]'],
  props: {
    evaluation: {
      type: String,
    },
    title: {
      type: String,
    },
    content: {
      type: String,
    },
    createdDate: {
      type: String,
    }
  },
  data: function(){
    return {
      _evaluation: null,
      _title: null,
      _content: null,
      _createdDate: null,
      is_hidden: true,
      is_positive: false,
      is_normal: false,
      is_negative: false,
      class_name: null,
    }
  },
  methods: {
    hidden() {
      this.is_hidden = !this.is_hidden;
    },
  },
  computed: {},
  created: function() {
    this._evaluation = this.evaluation;
    switch (this.evaluation) {
      case '+':
        this.is_positive = true;
        this.class_name = 'positive';
        break;
      case '-':
        this.is_negative = true;
        this.class_name = 'negative';
        break;
      default:
        this.is_normal = true;
        this.class_name = 'normal';
    }
    this._title = this.title;
    this._content = this.content;
    this._createdDate = this.createdDate;
  },
  template: `
  <div class="comments">
    <div class="comment-card">
      <div class="comment-body">
        <p class="comment-evaluation" :class="class_name">[[ evaluation ]]</p>
        <h5 class="comment-title">[[ _title ]]</h5>
        <hr>
          <template v-if="is_positive">
            <p class="comment-content">
              [[ _content ]]
            </p>
          </template>
          <template v-else>
            <p v-if="!is_hidden" class="comment-content">
              [[ _content ]]
            </p>
          </template>
      </div>
      <div>
        <button v-if="!is_positive && is_hidden" class="btn-show" @click="hidden()">続きを見る+</button>
      </div>
      <div class="write-date">
        <small>[[ _createdDate.split(' ')[0] ]]</small>
      </div>
    </div>
  </div>
  `
});

Vue.component('bs-progress', {
  delimiters: ['[[', ']]'],
  props: {
    positive: {
      type: String,
    },
    normal: {
      type: String,
    },
    nagative: {
      type: String,
    },
  },
  data: function() {
    return {}
  },
  methods: {
    per_style(val) {
      return `width: ${val}%`
    },
  },
  tempalte: `
  <div class="progress">
    <div class="progress-bar progress-bar-left"data-toggle="tooltip" v-tooltip.top="positive" role="progressbar" style="per_style(positive)" aria-valuenow="positive" aria-valuemin="0" aria-valuemax="100"></div>
    <div class="progress-bar bg-success" v-tooltip.top="normal" role="progressbar" style="per_style(normal)" aria-valuenow="normal" aria-valuemin="0" aria-valuemax="100"></div>
    <div class="progress-bar bg-info progress-bar-right" v-tooltip.top="negative" role="progressbar" style="per_style(negative)" aria-valuenow="normal" aria-valuemin="0" aria-valuemax="100"></div>
  </div>
  `
});

new Vue({
  el: '#app',
  delimiters: ['[[', ']]'],
  data: {
  	positive: '17件',
  	normal: '1件',
  	negative: '20件',
  },
  methods: {
  },
  computed: {
  },
});