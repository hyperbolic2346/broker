# broker
Uses a REST API to post auctions. Run from a LAMP server. Uses a DB to store information about the auctions and ensures the correct ones are posted.

# Goals
The goal is to make a site to input auction information about guns and then set the number of auctions to post. The program will create the auctions desired and ensure they have the correct settings and descriptions. The idea is the entire possible inventory is set up in the database and then stock is enabled for posting as it arrives.


# db schema
Item table
 - item id
 - item name - name of the item - only used for display inside this app
 - settings id - settings to use for this item
 - auction amount - number of items to auction
 - split auctions - bool to indicate grouping into a single auction with multiple items vs multiple auctions

Settings table
 - settings id
 - auto accept price
 - auto reject price
 - auto relist
 - auto relist fixed count
 - buy now price
 - can offer
 - category id
 - collect taxes
 - condition
 - country code
 - description
 - fixed price
 - gtin
 - inspection period
 - is ffl required
 - listing duration
 - mfg part number
 - payment methods
 - picture group id
 - postal code
 - prop 65 warning
 - quantity
 - reserve price
 - sales taxes
 - use default sales tax
 - serial number
 - shipping class costs
 - shipping classes supported
 - shipping profile id
 - sku
 - standard text id
 - starting bid
 - title
 - upc
 - weight
 - weight unit
 - who pays shipping
 - will ship international
 
Picture Group - a grouping of pictures - like pictures of a single item
 - group id
 - group name
 
Picture groups - groups of pictures - no id is unique here and can be repeated if the picture is in multiple groups or a group has multiple pictures
 - group id
 - picture id

Picture
 - picture id
 - picture filename
 - picture data blob
