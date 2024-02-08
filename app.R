#
# This is a Shiny web application. You can run the application by clicking
# the 'Run App' button above.
#
# Find out more about building applications with Shiny here:
#
#    https://shiny.posit.co/
#

library(shiny)
library(rairtable)
library(DT)
library(readr)
library(ggplot2)
library(dplyr)
library(likert)
library(vip)
library(stringi)

#View(lab_tests)
#system APIs setting
api_key <- "patweunnVGjP43fPi.c9570fff47b874d35167b2b45ab5371906a6421b5b034b21192be0d14ac0ded5"
base_id <- "appL71qWiNJTPcpL1"
table_id <- "tblvJmbqa2QUKK2co"

# Define UI for application that display the data
# Define the UI

ui = fluidPage(
  titlePanel( h4("Lab Project")),
  navbarPage(
    title = "Test Report",
    tabPanel("DataSet",  dataTableOutput("airtable_table")),
    tabPanel("Malaria", plotOutput("malaria")),
    tabPanel("Sicklin",plotOutput("tuberclosis")),
    tabPanel("HIV", plotOutput("hiv")),
    tabPanel("Labs", plotOutput("labs"))
  )
  
)

# Define the server logic
server <- function(input, output) {
  
  # Function to retrieve data from 
  get_airtable_data <- function() {
    # Specify your table name in 
    table_name <- "labtests"
    set_airtable_api_key(api_key, install = FALSE)
   
     # Retrieve data from airtable dataset
    lab_tests_tab <- airtable(table_id, base_id)
    lab_tests <- read_airtable(lab_tests_tab, fields = NULL, id_to_col = TRUE, max_rows = 50000)
    return(lab_tests)
  }

  
  # Render the table output
  output$airtable_table <- renderDataTable({
    
    # Call the function to get Airtable data
    lab_tests <- get_airtable_data()
    
    # Check if data is available
    if (!is.null(lab_tests)) {
      
      datatable(lab_tests)
      
    } else {
      "Error loading data from Airtable."
    }
  })
  
  # Render the barplot output
  output$malaria <- renderPlot({
    
    # Call the function to get Airtable data
    lab_tests <- get_airtable_data()
    
    # Check if data is available
    if (!is.null(lab_tests)) {
      #putting the dataset into ggplot
      ggplot(lab_tests, aes(x=Month, y=Malaria_Positive, fill= Lab))+
        geom_col()+ 
        theme_bw()+
        geom_text(aes(y = Malaria_Positive, label = Malaria_Positive), color = "yellow", size=6) 
      
      # suppress legend
      # theme(legend.position="none")
      
      
    } else {
      "Error loading data from Airtable."
    }
  })
  
  output$tuberclosis <- renderPlot({
    
    # Call the function to get Airtable data
    lab_tests <- get_airtable_data()
    
    # Check if data is available
    if (!is.null(lab_tests)) {
      #putting the dataset into ggplot
      ggplot(lab_tests, aes(x=year, y=TB_Total, group = TB_Positive, color =TB_Positive ))+
        geom_bar(stat = "identity") +
        theme_bw()+
        geom_text(aes(y = TB_Positive, label = TB_Positive), color = "yellow", size=5) 
      
      # suppress legend
      # theme(legend.position="none")
      
      
    } else {
      "Error loading data from Airtable."
    }
  })
  
  output$hiv <- renderPlot({
    
    # Call the function to get Airtable data
    lab_tests <- get_airtable_data()
    
    # Check if data is available
    if (!is.null(lab_tests)) {
      #putting the dataset into ggplot
      ggplot(lab_tests, aes(x=year, y=HIV_Total, group = HIV_Positive, color =HIV_Positive ))+
        geom_bar(stat = "identity") +
        theme_bw()+
        geom_text(aes(y = HIV_Positive, label = HIV_Positive), color = "yellow", size=5) 
      
      # suppress legend
      # theme(legend.position="none")
      
      
    } else {
      "Error loading data from Airtable."
    }
  })
  
  output$labs <- renderPlot({
    
    # Call the function to get Airtable data
    lab_tests <- get_airtable_data()
    
    # Check if data is available
    if (!is.null(lab_tests)) {
      #putting the dataset into ggplot
      ggplot(lab_tests, aes(x=Month, y=Total_test, group = Lab, color =Lab, size=4))+
        #geom_bar(stat = "identity") +
        geom_point()+
        geom_smooth(intercept = 37, slope = -5, color="black", 
                    linetype="dashed", size=1)
      #theme_bw()+
      # geom_text(aes(y = HIV_Positive, label = HIV_Positive), color = "yellow", size=5) 
      
      # suppress legend
      # theme(legend.position="none")
      
      
    } else {
      "Error loading data from Airtable."
    }
  })
}


# Define server logic required to draw a histogram 
# Run the application 
shinyApp(ui = ui, server = server)
