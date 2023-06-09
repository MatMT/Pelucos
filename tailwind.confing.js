module.exports = {
    theme: {
      extend: {
        colors: {
            'eternity': {
                '50': '#fbf9f2',
                '100': '#f5f1e0',
                '200': '#e9e0bf',
                '300': '#dbca96',
                '400': '#cbaf6c',
                '500': '#c0994f',
                '600': '#b38543',
                '700': '#956b39',
                '800': '#785634',
                '900': '#62472d',
                '950': '#1a120b',
            },
            
        }
      }
    },
  }
  
  // Initialization for ES Users
import {
  Modal,
  Ripple,
  initTE,
} from "tw-elements";

initTE({ Modal, Ripple });