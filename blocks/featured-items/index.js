const { useBlockProps, InspectorControls } = wp.blockEditor;
const { PanelBody, RangeControl } = wp.components;
const { registerBlockType } = wp.blocks;

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
                        onChange: (value) => setAttributes({ count: value }),
                        min: 1,
                        max: 10,
                        __next40pxDefaultSize: true,
                        __nextHasNoMarginBottom: true
                    })
                )
            ),
            wp.element.createElement(
                'div',
                useBlockProps(),
                wp.element.createElement('p', null, 'Featured Items will appear on the frontend.'),
                wp.element.createElement('p', null, `Items count: ${count}`)
            )
        );
    },
    save: () => null // server-side block
});