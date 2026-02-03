const { useBlockProps, InspectorControls } = wp.blockEditor;
const { PanelBody, RangeControl } = wp.components;
const { registerBlockType } = wp.blocks;
const ServerSideRender = wp.serverSideRender;

registerBlockType('fim/featured-items', {
    title: 'Featured Items',
    icon: 'star-filled',
    category: 'widgets',
    attributes: {
        count: { type: 'number', default: 5 }
    },
    edit: (props) => {
  const { attributes, setAttributes } = props;
  const { count } = attributes;

  return wp.element.createElement(
    wp.element.Fragment,
    null,

    wp.element.createElement(
      InspectorControls,
      null,
      wp.element.createElement(
        PanelBody,
        { title: 'Settings' },
        wp.element.createElement(RangeControl, {
          label: 'Number of items',
          value: count,
          min: 1,
          max: 10,
          onChange: (value) => setAttributes({ count: value }),
        })
      )
    ),

    wp.element.createElement(
      'div',
      useBlockProps(),
      wp.element.createElement(wp.serverSideRender, {
        block: 'fim/featured-items',
        attributes,
      })
    )
  );
}
,
    save: () => null // server-side block
});