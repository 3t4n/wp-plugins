export default function Switcher(props) {

    let {isPro, name, value, handleChange} = props
    if (typeof isPro === 'undefined') isPro = true;

    return (
        <div
            className={`hide-anything-switcher ${'on' === value ? 'active' : ''}`}
            onClick={() => handleChange({[name]: 'on' === value ? 'off' : 'on'})}>

            <span>OFF</span>
            <div className="switcher">
                <label htmlFor={name}></label>
            </div>
            <span>ON</span>

        </div>
    )
}