import {useMemo} from '@wordpress/element';
import {
    __experimentalUseCustomUnits as useCustomUnits, // eslint-disable-line
    __experimentalUnitControl as UnitControl, // eslint-disable-line
    __experimentalParseQuantityAndUnitFromRawValue as parseQuantityAndUnitFromRawValue, // eslint-disable-line
} from '@wordpress/components';

const {__} = wp.i18n;

export default function DimensionControl({onChange, label, units, value}) {
    const availableUnits = useCustomUnits({
        availableUnits: ['%', 'px', 'em', 'rem', 'vw'],
    });

    const selectedUnit =
        useMemo(
            () => parseQuantityAndUnitFromRawValue(value),
            [value]
        )[1] ||
        availableUnits[0]?.value ||
        'px';

    const handleChange = (unitValue) => {
        // Prevent the unit from getting returned if there is no actual value set.
        const [newValue, newUnit] = // eslint-disable-line
            parseQuantityAndUnitFromRawValue(unitValue);
        if (newValue) {
            onChange(unitValue);
        }

        console.log(unitValue)
    };

    const handleUnitChange = (newUnit) => {
        // Attempt to smooth over differences between currentUnit and newUnit.
        // This should slightly improve the experience of switching between unit types.
        const [currentValue, currentUnit] =
            parseQuantityAndUnitFromRawValue(value);

        if (['em', 'rem'].includes(newUnit) && currentUnit === 'px') {
            // Convert pixel value to an approximate of the new unit, assuming a root size of 16px.
            onChange((currentValue / 16).toFixed(2) + newUnit);
        } else if (
            ['em', 'rem'].includes(currentUnit) &&
            newUnit === 'px'
        ) {
            // Convert to pixel value assuming a root size of 16px.
            onChange(Math.round(currentValue * 16) + newUnit);
        } else if (
            ['vh', 'vw', '%'].includes(newUnit) &&
            currentValue > 100
        ) {
            // When converting to `vh`, `vw`, or `%` units, cap the new value at 100.
            onChange(100 + newUnit);
        }
    };

    return (
        <fieldset className="components-dimension-control">
            <label className="components-base-control__label formatted-label">{__('Form width', 'content-protector')}</label>
            <UnitControl
                value={value}
                units={availableUnits}
                onChange={handleChange}
                onUnitChange={handleUnitChange}
                min={0}
                size={'__unstable-large'}
            />
        </fieldset>
    );
}