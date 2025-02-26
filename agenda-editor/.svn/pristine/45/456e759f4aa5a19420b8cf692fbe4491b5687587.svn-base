import React from 'react'

const TabButton = ({tabindex,activeTab,setActiveTab,title}) => {
    return <div className="w-full p-2">
        <button className={"w-full outline-none font-normal border tracking-wide appearance-none text-sm p-2 rounded shadow text-center "+(activeTab==tabindex?'bg-teal-700 text-white border-teal-800':'bg-gray-100 text-black border-grey-800')}
        onClick={()=>{setActiveTab(activeTab==tabindex?-1:tabindex)}} {...{'aria-pressed':activeTab==tabindex?'true':'false'}}>{title}</button>
    </div>
}
export default TabButton