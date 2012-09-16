<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:output method="xml" version="5.0" encoding="utf-8" indent="yes"
              standalone="yes" omit-xml-declaration="yes"/>



  <xsl:template name="TextArea">
    <xsl:param name="value" />
    <textarea><xsl:value-of select="$value"/></textarea>
  </xsl:template>

</xsl:stylesheet>
