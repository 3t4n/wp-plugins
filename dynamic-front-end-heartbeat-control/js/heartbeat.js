((wp) => {
  const intervals = {
    low: [15, 30, 60, 120, 180, 240, 300],
    medium: [30, 60, 120, 180, 240, 300],
    high: [60, 120, 180, 240, 300],
  };

  const cacheTimeout = 5 * 60 * 1000;
  const cache = {};

  const getCache = (key) => {
    const cachedData = localStorage.getItem(key);
    if (cachedData) {
      const { timestamp, data } = JSON.parse(cachedData);
      if (new Date().getTime() - timestamp < cacheTimeout) {
        return data;
      }
    }
    return null;
  };

  const setCache = (key, data) => 
    localStorage.setItem(key, JSON.stringify({ timestamp: new Date().getTime(), data }));

  const getRecommendedIntervals = async (nonce) => {
    const cacheKey = 'dfehc_server_load';
    const cachedData = getCache(cacheKey);

    if (cachedData) return cachedData;

    const response = await fetch(ajaxurl, {
      method: 'POST',
      body: JSON.stringify({
        action: 'get_server_load',
        nonce,
      }),
      headers: {
        'Content-Type': 'application/json',
      },
    });

    if (response.ok) {
      const serverLoad = await response.json();
      setCache(cacheKey, serverLoad);
      return serverLoad;
    }
    throw new Error('Error retrieving server load');
  };

  const smoothMoving = (x) => {
    let sum = 0;
    const y = [];
    x.forEach((val) => {
      if (y.length >= 5) sum -= y.shift();
      y.push(val);
      sum += val;
    });
    return sum / y.length;
  };

  const getWeightedAverage = (recentIntervals) => 
    recentIntervals.reduce((total, value, index) => total + value * (5 - index), 0) / 15;

  const getTrafficLevel = (serverLoad) => {
    if (serverLoad <= 50) return 'low';
    if (serverLoad <= 75) return 'medium';
    return 'high';
  };

  const calculateRecommendedInterval = (serverLoad) => {
    if (cache[serverLoad]) return cache[serverLoad];

    const trafficLevel = getTrafficLevel(serverLoad);
    const recentIntervals = intervals[trafficLevel].slice(-5);
    const weightedAverage = getWeightedAverage(recentIntervals);
    const smoothedInterval = smoothMoving(recentIntervals);
    const maxServerLoad = 85;
    const loadFactor = 1 - serverLoad / maxServerLoad;
    const recommendedInterval = Math.round(weightedAverage + smoothedInterval * loadFactor);

    cache[serverLoad] = recommendedInterval;
    return recommendedInterval;
  };

  const heartbeat = {
    updateHeartbeatInterval: (interval) => wp.heartbeat.interval(interval),

    updateUI: function (recommendedInterval) {
      const intervalSelect = document.querySelector('#dfehc-heartbeat-interval');
      intervalSelect.value = recommendedInterval;
      this.updateHeartbeatInterval(recommendedInterval);
    },

    init: async function (nonce) {
      try {
        const serverLoad = await getRecommendedIntervals(nonce);
        const recommendedInterval = calculateRecommendedInterval(serverLoad);
        this.updateUI(recommendedInterval);
      } catch (error) {
        console.error(`Error: ${error.message}`);
      }
    },
  };

  document.addEventListener('DOMContentLoaded', () => {
    if (dfehc_heartbeat_vars.heartbeat_control_enabled === '1') {
      const { nonce } = dfehc_heartbeat_vars;
      heartbeat.init(nonce);

      document.querySelector('#dfehc-heartbeat-interval').addEventListener('change', function() {
        const newInterval = this.value;
        heartbeat.updateHeartbeatInterval(newInterval);
      });
    }
  });
})(wp);