// pages/home/home.js
var app = getApp()
Page({
  data: {
    navbar: ['红葡萄酒', '白葡萄酒', '香槟', '小食'],
    currentTab: 0,

    // banner
    imgUrls: [
      'https://img.alicdn.com/imgextra/i3/1611893164/TB2JCFQga8lpuFjy0FpXXaGrpXa_!!1611893164.jpg',
      'https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=1969406455,435281924&fm=26&gp=0.jpg',
      'https://ss1.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=3540505098,2904907193&fm=200&gp=0.jpg'
    ],
    indicatorDots: true, //是否显示面板指示点
    autoplay: true, //是否自动切换
    interval: 3000, //自动切换时间间隔,3s
    duration: 1000, //    滑动动画时长1s

    //新品数据
    product1:{
      name: '长城干红葡萄酒',
      pic:'￥599/6瓶'
    }
      
      
  


    },
  


  // 导航切换监听
  navbarTap: function (e) {
    console.debug(e);
    this.setData({
      currentTab: e.currentTarget.dataset.idx
    })
  },
  //下拉刷新
  onPullDownRefresh: function () {
    wx.showNavigationBarLoading() //在标题栏中显示加载

    //模拟加载
    setTimeout(function () {
      // complete
      wx.hideNavigationBarLoading() //完成停止加载
      wx.stopPullDownRefresh() //停止下拉刷新
    }, 1500);
  },

})
