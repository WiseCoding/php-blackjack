module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
  },
  purge: {
    enabled: true, //toggle
    content: ['./index.php', './src/php/*.php'],
  },
  theme: {
    extend: {
      fontSize: {
        '8xl': '6rem',
        '9xl': '10rem',
        '10xl': '12rem',
      },
    },
  },
  variants: {},
  plugins: [],
};
