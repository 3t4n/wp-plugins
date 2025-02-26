import _ from 'lodash'
import React from 'react'
window.lodash = _.noConflict()
const {TextareaControl} = wp.components

wp.blocks.registerBlockType('agendahelsinki/html',{
    title: 'HTML (Tweaked)',
    icon: {
        background: '#fff',
        foreground:'#FFCDD2',
        src:<svg width={30} height={30} viewBox="0 0 16 16" className="bi bi-columns" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fillRule="evenodd" 
            d="M4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0zm-.999-3.124a.5.5 0 0 1 .33.625l-4 13a.5.5 0 0 1-.955-.294l4-13a.5.5 0 0 1 .625-.33z"/>
        </svg>
    },
    category: 'agendahelsinki',
    example:()=>null,
    supports:{
        defaultStylePicker:false,
        align: [ 'left', 'right', 'center', 'wide', 'full' ]
    },
    getEditWrapperProps:(attributes)=>{
		return {
            'data-align': null,
        }
	},
    attributes: {
        content: {type: 'string',default: ''},
    },
    edit:(props)=>{
        const {attributes,setAttributes} = props
        const {content} = attributes
        return <div style={{display:'block',width:'100%',padding:'0.25rem',border:'1px solid #000'}}>
            <div style={{width:'100%',display:'block',backgroundColor:'#fff',paddingTop:'0.5rem',paddingBottom:'0.5rem',paddingLeft:'1rem',paddingRight:'1rem'}}>
                <h2 style={{display:'block',width:'100%',fontSize:14,lineHeight:1.5,fontWeight:400,color:'#000'}}>HTML</h2>
            </div>
            <textarea rows={16} value={content} onChange={(e)=>setAttributes({content:e.target.value})} 
            style={{display:'block',width:'100%',padding:'0.5rem',backgroundColor:'#fff',color:'#000',border:'none',outline:'none',fontFamily:'Menlo,Consolas,monaco,monospace',
            lineHeight:1.5,fontSize:12,maxHeight:250,overflowY:'scroll',borderRadius:0}} />
        </div>
    },
    save:(props)=>{
        return <div dangerouslySetInnerHTML={{__html:props.attributes.content}} />
    }
})