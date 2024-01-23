import { utility } from '@/utility';

const UtilityPlugin = {
  install: (app) => {
    app.config.globalProperties.$utils = utility;
  },
};

export default UtilityPlugin;